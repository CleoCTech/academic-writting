<?php

namespace App\Http\Livewire\Client;

use App\Events\OrderAnswerUploadEvent;
use App\Models\AcceptedOrder;
use App\Models\Activity;
use App\Models\Client;
use App\Models\ClientFile;
use App\Models\Message;
use App\Models\MessageTo;
use App\Models\Msg;
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
    public $orderDetails, $messages_sent, $messages_received, $messages, $activitie, $clientFiles, $companyFiles, $revisions, $writerFiles=[];


    protected $listeners = [
        'back'=>'back',
        'sendMessage'=>'sendMessage',
        'getDownload'=>'getDownload',
        'edit'=>'edit',
        'confrimInvoice'=>'confrimInvoice',
        'rejectInvoice'=>'rejectInvoice',
    ];
    public function back()
    {
        $this->emit('update_varView', '');
    }
    public function sendInvoice()
    {
        // if (session()->get('LoggedClient')!=null) {
        //     $id = session()->get('LoggedClient');
        //     $this->from_id= $id;
        //     $this->to_id=1 ;
        //     $this->type= 'Client';
        // }
        if (auth()->user()!=null) {
            $this->from_id=auth()->user()->id;
            $this->to_id=$this->orderDetails->client_id;
            $this->type= 'Admin';
        }
        Activity::create([
            'name' => 'Sent Invoice',
            'value' => $this->fee,
            'from_id' => $this->from_id,
            'to_id' => $this->to_id,
            'type' => $this->type,
        ]);

        $this->reset('fee');

    }
    public function rejectInvoice()
    {
        Activity::where('id', $this->activity_id)
                ->update(['status' => 'rejected']);
        session()->flash('Invoice-Rejected', 'Invoice has been declined. Create a new one');
    }
    public function confrimInvoice()
    {
        if (session()->get('LoggedClient')!=null) {
            $id = session()->get('LoggedClient');
            $this->from_id= $id;
            $this->to_id=1 ;
            $this->type= 'Client';
        }

        $this->orderId = session()->get('orderId');
        $order = Order::with('order')
                                    ->where('order_no', $this->orderId)
                                    ->first();
        OrderBilling::create([
            'order_id' => $order->id,
            'client_id' => $this->orderDetails->client_id,
            'amount' => $this->fee,
            'total_amount' => ($order->pages * $this->fee),
            'prepared_by' => $this->to_id,
        ]);

        Activity::where('id', $this->activity_id)
                ->update(['status' => 'responded']);

        Order::where('id',  $order->id)
                ->update(['status' => 'In progress']);
        session()->flash('Invoice-Confirmed', 'Invoice Confirmed Succesfully, Your Order Is In Progress.');
        return redirect()->route('dashboard');

    }

    public function sendMessage()
    {
        if (session()->get('LoggedClient')!=null) {
            $id = session()->get('LoggedClient');
            $this->from_id= $id;
            $this->to_id=1 ;
            $this->type= 'Client';
        }
        if (auth()->user()!=null) {

            $user = User::find(auth()->user()->id);
            $user->messages()->create([
                'message' => $this->messageText,
            ]);

            Msg::create([
                'message' => $this->messageText,
                'fromable_id' => $user->id,
                'fromable_type' => $user->messages(),
            ]);
            // $this->from_id=auth()->user()->id;
            // $this->to_id=$this->orderDetails->client_id;
            // $this->type= 'Admin';
        }
        // Message::create([
        //     'message' => $this->messageText,
        //     'from_id' => $this->from_id,
        //     'to_id' => $this->to_id,
        //     'type' => $this->type,
        //     'is_read' => 0,
        // ]);

        $this->reset('messageText');
    }

    public function render()
    {
         //check which user that need this component
         if (session()->get('LoggedClient')) {

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
            $this->messages = Message::where(function ($query) use ($user_id, $my_id) {
                $query->where('type', 'Admin')->where('to_id', $my_id );
            })->oRwhere(function ($query) use ($user_id, $my_id) {
                $query->where('from_id', $my_id)->where('type', 'Client');
            })->get();
            // ->latest()
            // ->take(10)
            // ->get()

            $this->activity = Activity::where(function ($query) use ($user_id, $my_id) {
                $query->where('type', 'Admin')->where('to_id', $my_id);
            })->latest('created_at')->first();

            if ($this->activity) {
                if ($this->activity->name == "Sent Invoice" && $this->activity->status == "waiting") {
                    $this->confirm_invoice =true;
                    $this->activity_id = $this->activity->id;
                    $this->fee = $this->activity->value;
                }elseif($this->activity->name == "Sent Invoice" && $this->activity->status == "responded" || $this->activity->status == "rejected"){
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
            $this->messages = Message::where(function ($query) use ($user_id, $my_id) {
                $query->where('from_id', $user_id)->where('to_id', $my_id);
            })->oRwhere(function ($query) use ($user_id, $my_id) {
                $query->where('from_id', $my_id)->where('to_id', $user_id);
            })->get();
            // ->latest()
            // ->take(10)
            // ->get()
            $this->activity = Activity::where(function ($query) use ($user_id, $my_id) {
                $query->where('type', 'Admin')->where('to_id', $user_id );
            })->latest('created_at')->first();

            if ($this->activity) {
                if ($this->activity->name == "Sent Invoice" && $this->activity->status == "responded") {
                    session()->flash('success', 'Invoice Accepted.');
                }elseif($this->activity->name == "Sent Invoice" &&  $this->activity->status == "rejected"){
                    session()->flash('error', 'Invoice Rejected.');
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
