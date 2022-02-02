<?php

namespace App\Http\Livewire\Client\Components;

use App\Events\OrderAnswerUploadEvent;
use App\Models\OrderStatus;
use App\Models\AcceptedOrder;
use App\Models\Order;
use App\Models\RejectedOrder;
use App\Models\WriterFile;
use App\Models\WriterOrder;
use App\Models\ClientFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class OrderSubmision extends Component
{
    public $orderDetails, $revisions, $clientFiles, $orderStatus, $companyFiles, $writerFiles, $messages =[];
    public $orderNextLevel = false;
    public $showOperationSection = false;
    public $reject_section, $accept_section, $saved=false;
    public $rejectBtn = true;
    public $acceptBtn = true;
    public $comment;


    public function mount($orderDetails, $revisions, $clientFiles, $orderStatus, $companyFiles, $writerFiles )
    {
        $this->orderDetails = $orderDetails;
        $this->revisions = $revisions;
        // $this->confirm_invoice = $confirm_invoice;
        $this->clientFiles = $clientFiles;
        $this->orderStatus = $orderStatus;
        $this->companyFiles = $companyFiles;
        $this->writerFiles = $writerFiles;
    }
    public function render()
    {
        return view('livewire.client.components.order-submision');
    }
    public function dropFile($id, $folder, $filename)
    {

        Storage::delete('client_files/'.$folder . '/' .$filename);
        rmdir('storage/client_files/' .$folder );
        DB::beginTransaction();
        try {
            ClientFile::where('id', $id)->delete();
            DB::Commit();
            session()->flash('success', 'File Deleted Successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error',$e);
        }
    }
    public function store()
    {
        $this->emit('saved');
        Order::where('id', $this->orderDetails->id)
                ->update(['status' => 'Complete']);
        event( new OrderAnswerUploadEvent($this->orderDetails, $this->orderDetails->client_id));
        $this->reset('companyFile');
        session()->flash('success', 'Order Submited Successfully.');

    }
    public function orderCurrentStatus($orderId)
    {
        $orderstaus = OrderStatus::where('order_id', $orderId)->first();
        if ($orderstaus) {
            return $orderstaus->current_position;
        } else {
            return 0;
        }
    }
    public function getDownload($value)
    {
        if (session()->has('LoggedClient')) {
            $file= 'storage/writer_files/' .$value;
            if (file_exists($file)) {
                return response()->download($file);
            } else {
                session()->flash('message', 'File Does Not Exist.');
            }
        } else {
            $file= 'storage/client_files/' .$value;

            if (file_exists($file)) {
                return response()->download($file);
            } else {
                session()->flash('message', 'File Does Not Exist.');
            }
        }
    }
    // public function grantOrderOperation($orderId, $role)
    // {
    //     dd($orderId, $role);
    //     $orderstaus = OrderStatus::where('order_id', $orderId)->first();
    //     if ($orderstaus) {
    //         if ($orderstaus->current_position === $role ) {
    //             $this->showOperationSection = true;
    //         }else{
    //             $this->showOperationSection = false;
    //         }
    //     }

    // }
    public function checkIfOrderPassedStage($orderId, $stage)
    {
        //stages = ['Admin', 'Client', 'Editor'];
        // dd($orderId .$stage);
        $orderRoute = AcceptedOrder::where('order_id', $orderId)
                                    ->where('from', $stage)
                                    ->first();
        if ($orderRoute) {
            $this->orderNextLevel =true;
            if (session()->has('LoggedClient')) {
                return "You Already took the order";
            } else {
                return "Order Already Submitted to the next Level";
            }


        } else {
            $this->orderNextLevel =false;
            return "No files uploaded";
        }

    }
    public function activateAcceptSection()
    {
        if ( $this->accept_section) {
            $this->accept_section=false;
            $this->acceptBtn=true;
        }else{
            $this->accept_section=true;
            $this->acceptBtn=false;
            $this->reject_section = false;
            $this->rejectBtn = true;
        }

    }
    public function activateRejectSection()
    {
        if ($this->reject_section) {
            $this->reject_section=false;
            $this->rejectBtn=true;
        }else{
            $this->reject_section=true;
            $this->rejectBtn=false;
            $this->accept_section =false;
            $this->acceptBtn = true;
        }
        // $this->reject_section=true;
    }
    public function reject($value)
    {
        $order = Order::where('order_no', $value)->first();
        $this->orderPK = $order->id;
        if ($this->comment == '') {
            $this->comment = 'Rejected';
        }
        if (session()->get('LoggedClient')) {
            RejectedOrder::create([
                'order_id'=>$this->orderPK,
                'comment'=>$this->comment,
                'from'=>'Client',
                'from_id'=>$this->orderDetails->client_id,
            ]);
           // event( new OrderAnswerUploadEvent($this->orderDetails, $this->orderDetails->client_id));
        }
        if (auth()->user()!=null && auth()->user()->role == 'Editor') {
            DB::transaction(function () {
                try {
                    RejectedOrder::create([
                        'order_id'=>$this->orderPK,
                        'comment'=>$this->comment,
                        'from'=>auth()->user()->role,
                        'from_id'=>auth()->user()->id,
                    ]);
                    $orderStatus = OrderStatus::updateOrCreate(
                        ['order_id' =>  $this->orderPK],
                        ['current_position' => 'Writer']
                    );
                    WriterOrder::where('order_id', $this->orderPK)
                                ->update(['status'=>'Revision']);
                    $this->accept_section=false;
                    session()->flash('success', 'Order Rejected.');
                    //notify writer
                } catch (\Throwable $th) {
                    session()->flash('success', $th->getMessage());
                }
            });

        }elseif (auth()->user()!=null && auth()->user()->is_admin == 1 && auth()->user()->role == 'Admin') {
            DB::transaction(function () {
                try {
                    RejectedOrder::create([
                        'order_id'=>$this->orderPK,
                        'comment'=>$this->comment,
                        'from'=>auth()->user()->role,
                        'from_id'=>auth()->user()->id,
                    ]);
                    $orderStatus = OrderStatus::updateOrCreate(
                        ['order_id' =>  $this->orderPK],
                        ['current_position' => 'Writer']
                    );
                    WriterOrder::where('order_id', $this->orderPK)
                                ->update(['status'=>'Revision']);
                    $this->accept_section=false;
                    session()->flash('success', 'Order Rejected.');
                    //notify writer
                } catch (\Throwable $th) {
                    session()->flash('success', $th->getMessage());
                }
            });
        }
    }
    public function accept($value)
    {
        $order = Order::where('order_no', $value)->first();
        $this->orderPK = $order->id;
        if ($this->comment == '') {
            $this->comment = 'Accepted';
        }
        if (session()->has('LoggedClient')) {
            DB::transaction(function () {
                try {
                    AcceptedOrder::create([
                        'order_id'=>$this->orderPK,
                        'comment'=>$this->comment,
                        'from'=>'Client',
                        'from_id'=>$this->orderDetails->client_id,
                    ]);

                    WriterOrder::where('order_id', $this->orderPK)
                                ->update([
                                    'status' => 'Completed'
                                ]);
                    Order::where('id', $this->orderPK)
                         ->update([
                             'status'=>'Complete'
                         ]);
                    $this->accept_section=false;
                    session()->flash('success', 'Order Accepted Successfully.');
                    // event( new OrderAnswerUploadEvent($this->orderDetails, $this->orderDetails->client_id));
                } catch (\Throwable $th) {
                    session()->flash('success', $th->getMessage());
                }

            });

        }
        if (auth()->user()!=null && auth()->user()->role == 'Editor') {
            DB::transaction(function () {
                try {
                    AcceptedOrder::create([
                        'order_id'=>$this->orderPK,
                        'comment'=>$this->comment,
                        'from'=>auth()->user()->role,
                        'from_id'=>auth()->user()->id,
                    ]);
                    $orderStatus = OrderStatus::updateOrCreate(
                        ['order_id' =>  $this->orderPK],
                        ['current_position' => 'Admin']
                    );
                    $this->accept_section=false;
                    session()->flash('success', 'Order Accepted Successfully.');
                } catch (\Throwable $th) {
                    session()->flash('success', $th->getMessage());
                }
            });

        } elseif (auth()->user()!=null && auth()->user()->is_admin == 1 && auth()->user()->role == 'Admin') {

            DB::transaction(function () {
                try {

                    AcceptedOrder::create([
                        'order_id'=>$this->orderPK,
                        'comment'=>$this->comment,
                        'from'=>auth()->user()->role,
                        'from_id'=>auth()->user()->id,
                    ]);
                    $orderStatus = OrderStatus::updateOrCreate(
                        ['order_id' =>  $this->orderPK],
                        ['current_position' => 'Client']
                    );
                    WriterFile::where('order_id', $this->orderPK)
                                ->update([
                                    'status' => 'Accepted'
                                ]);
                    $this->accept_section=false;
                    session()->flash('success', 'Order Accepted Successfully.');
                } catch (\Throwable $th) {
                    session()->flash('success', $th->getMessage());
                }
            });

        }
    }
}
