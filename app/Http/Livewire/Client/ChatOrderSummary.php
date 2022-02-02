<?php

namespace App\Http\Livewire\Client;

use App\Events\InvoiceSentEvent;
use App\Events\OrderAnswerUploadEvent;
use App\Events\OrderSubmittedEvent;
use App\Models\AcceptedOrder;
use App\Models\Activity;
use App\Models\Client;
use App\Models\ClientFile;
use App\Models\Message;
use App\Models\MessageTo;
use App\Models\Msg;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderBilling;
use App\Models\OrderStatus;
use App\Models\RejectedOrder;
use App\Models\User;
use App\Models\WriterFile;
use App\Models\WriterOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session ;
use Livewire\Component;
use App\Traits\LayoutTrait;
use App\Traits\AdminPropertiesTrait;
use App\Traits\SearchFilterTrait;
use App\Traits\SearchTrait;
use Illuminate\Support\Facades\Storage;
use Mockery\Matcher\Not;
use Psy\Command\WhereamiCommand;

class ChatOrderSummary extends Component
{

    use LayoutTrait;
    use AdminPropertiesTrait;
    use SearchFilterTrait;
    use SearchTrait;

    public $orderPK, $orderId, $client, $admin, $messageText, $from_id, $to_id, $type, $fee, $activity, $activity_id, $file_id, $companyFile, $comment;
    public $confirm_invoice, $reject_section, $accept_section, $saved=false;
    public $rejectBtn = true;
    public $acceptBtn = true;
    public $total_fee='Pending';
    public $orderStatus=false;
    public $showOperationSection = false;
    public $orderNextLevel = false;
    public $InvoiceAccepted = false;
    public $InvoiceRejected = false;
    public $orderDetails, $messages_sent, $messages_received, $messages, $activitie, $clientFiles, $companyFiles, $revisions, $writerFiles=[];

    public $user_type;

    protected $listeners = [
        'back'=>'back',
        'sendMessage'=>'sendMessage',
        'getDownload'=>'getDownload',
        'edit'=>'edit',
        'confrimInvoice'=>'confrimInvoice',
        'rejectInvoice'=>'rejectInvoice',
        'invoice-sent' => '$refresh',
        'rejectOrder' => 'reject',
        'acceptOrder' => 'accept',
        'activateRejectSection' => 'activateRejectSection',
        'activateAcceptSection' => 'activateAcceptSection',
    ];
    public function back()
    {
        $this->emit('update_varView', '');
    }


    public function render()
    {
         //check which user that need this component
         if (session()->get('LoggedClient')) {

            $this->user_type = 'App\Models\Client';
            $this->orderId = session()->get('orderId');
            $this->orderDetails = Order::with('order')
                                        ->where('order_no', $this->orderId)
                                        ->first();
            if ($this->orderDetails->status == 'Pending') {
                $this->orderStatus =true;
            }
            $order_bill = OrderBilling::where('order_id',  $this->orderDetails->id)->first();
            if ($order_bill) {
                $this->total_fee = $order_bill->total_amount;
            }
            $user_id = 'Client';
            $my_id = session()->get('LoggedClient');
            $this->client = session()->get('LoggedClient');
            // Message::where(['from_id' => $user_id, 'to_id' => $my_id])->update(['is_read' => 1]);
            // Get all message from selected user

            $this->activity = Notification::where('order_no', $this->orderId)
            ->where('status', 'waiting')
            ->first();

            if ($this->activity) {
                if ($this->activity->title == "Sent Invoice") {
                    $this->confirm_invoice =true;
                    $this->activity_id = $this->activity->id;
                    $this->fee = $this->activity->value;

                }elseif($this->activity->title == "Sent Invoice" && $this->activity->status == "responded" || $this->activity->status == "rejected"){
                    $this->confirm_invoice =false;
                }
            }
            $this->clientFiles = ClientFile::where('client_id', $my_id)
                                            ->where('order_id',  $this->orderDetails->id)
                                            ->where('from',  'client')
                                            ->get();
            $this->companyFiles = ClientFile::where('client_id', $my_id)
                                            ->where('order_id',  $this->orderDetails->id)
                                            ->where('from',  'company')
                                            ->get();
            $this->writerFiles = WriterFile::where('order_id',  $this->orderDetails->id)
                                            ->where('status', 'Accepted')
                                            ->get();
            $this->revisions = RejectedOrder::where('order_id', $this->orderDetails->id)->get();
        }

        if (auth()->user()!=null) {
            $this->user_type = 'App\Models\User';
            $this->orderId = session()->get('orderId');
            $this->orderDetails = Order::with('order')
                                        ->where('order_no', $this->orderId)
                                        ->first();
            if ($this->orderDetails->status == 'Pending') {
                $this->orderStatus =true;
            }
            $order_bill = OrderBilling::where('order_id',  $this->orderDetails->id)->first();
            if ($order_bill) {
               $this->total_fee = $order_bill->total_amount;
            }
            $user_id =$this->orderDetails->client_id;
            $my_id = auth()->user()->id;
            // Message::where(['from_id' => $user_id, 'to_id' => $my_id])->update(['is_read' => 1]);
            // Get all message from selected user
            $this->activity = Notification::where('order_no', $this->orderId)
            ->where('status', 'rejected')
            ->first();

            if ($this->activity != null) {
                if ($this->activity->title == "Sent Invoice") {
                    $this->confirm_invoice =true;
                    $this->activity_id = $this->activity->id;
                    $this->fee = $this->activity->value;

                }elseif($this->activity->title == "Sent Invoice" && $this->activity->status == "responded" ){
                    $this->confirm_invoice =false;
                }
            }

            if ($this->activity != null) {
                if ($this->activity->name == "Sent Invoice" && $this->activity->status == "responded") {
                    $this->InvoiceAccepted = true;
                }elseif($this->activity->name == "Sent Invoice" &&  $this->activity->status == "rejected"){
                    $this->InvoiceRejected = true;
                }
            }

            $this->clientFiles = ClientFile::where('client_id', $user_id)
                                            ->where('order_id',  $this->orderDetails->id)
                                            ->where('from',  'client')
                                            ->get();
            $this->companyFiles = ClientFile::where('client_id', $user_id)
                                            ->where('order_id',  $this->orderDetails->id)
                                            ->where('from',  'company')
                                            ->get();
            $this->writerFiles = WriterFile::where('order_id',  $this->orderDetails->id)
                                            ->get();
            $this->grantOrderOperation($this->orderDetails->id, auth()->user()->role);
            $this->revisions = RejectedOrder::where('order_id', $this->orderDetails->id)->get();
        }

        return view('livewire.client.chat-order-summary');
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
    public function orderCurrentStatus($orderId)
    {
        $orderstaus = OrderStatus::where('order_id', $orderId)->first();
        if ($orderstaus) {
            return $orderstaus->current_position;
        } else {
            return 0;
        }
    }
    public function grantOrderOperation($orderId, $role)
    {
        $orderstaus = OrderStatus::where('order_id', $orderId)->first();
        if ($orderstaus) {
            if ($orderstaus->current_position === $role ) {
                $this->showOperationSection = true;
            }else{
                $this->showOperationSection = false;
            }
        }

    }
    public function checkIfOrderPassedStage($orderId, $stage)
    {
        //stages = ['Admin', 'Client', 'Editor'];
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
    public function edit()
    {

        $this->emit('update_varView', 'edit');

    }
    public function dropFile($id, $folder, $filename)
    {
        DB::beginTransaction();
        try {

            $file = ClientFile::where('id', $id)->first();
            $order = $file->order_id;
            Order::where('id', $order)
            ->update([
                'status' => 'In progress'
            ]);
            if (OrderStatus::where('order_id', $order)->exists()) {
                OrderStatus::where('order_id', $order)->update(['current_position' =>'Admin']);
            }
            Storage::delete('client_files/'.$folder . '/' .$filename);
            rmdir('storage/client_files/' .$folder );
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
        DB::beginTransaction();
        try {
            Order::where('id', $this->orderDetails->id)
                ->update(['status' => 'Complete']);
            OrderStatus::updateOrCreate(
                ['order_id' =>  $this->orderDetails->id],
                ['current_position' => 'Client']
            );
            Notification::create([
                'title'=>'Order Submitted',
                'fromable_id'=>auth()->user()->id,
                'toable_id'=>$this->orderDetails->client_id,
                'fromable_type'=>'App\Models\User',
                'toable_type'=>'App\Models\Client',
                'value'=>0,
                'order_no'=>$this->orderDetails->order_no,
                'status'=>'waiting'
            ]);
            event( new OrderAnswerUploadEvent($this->orderDetails, $this->orderDetails->client_id));
            $this->reset('companyFile');
            DB::commit();
            session()->flash('success', 'Order Submited Successfully.');

        } catch (\Throwable $th) {
            DB::rollback();
             session()->flash('error',$th);
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

            DB::beginTransaction();
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
                Notification::create([
                    'title'=>'Order Submitted',
                    'fromable_id'=>auth()->user()->id,
                    'toable_id'=>$this->orderDetails->client_id,
                    'fromable_type'=>'App\Models\User',
                    'toable_type'=>'App\Models\Client',
                    'value'=>0,
                    'order_no'=>$value,
                    'status'=>'waiting'
                ]);
                $this->accept_section=false;
                event( new OrderSubmittedEvent($value));
                DB::commit();
                session()->flash('success', 'Order Accepted Successfully.');
            } catch (\Throwable $th) {
                DB::rollback();
                session()->flash('success', $th->getMessage());
            }

        }
    }
}