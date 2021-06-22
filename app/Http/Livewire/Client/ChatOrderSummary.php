<?php

namespace App\Http\Livewire\Client;

use App\Events\OrderAnswerUploadEvent;
use App\Models\AcceptedOrder;
use App\Models\Activity;
use App\Models\Client;
use App\Models\ClientFile;
use App\Models\Message;
use App\Models\MessageTo;
use App\Models\Order;
use App\Models\OrderBilling;
use App\Models\RejectedOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session ;
use Livewire\Component;
use App\Traits\LayoutTrait;
use App\Traits\AdminPropertiesTrait;
use App\Traits\SearchFilterTrait;
use App\Traits\SearchTrait;
use Illuminate\Support\Facades\Storage;

class ChatOrderSummary extends Component
{

    use LayoutTrait;
    use AdminPropertiesTrait;
    use SearchFilterTrait;
    use SearchTrait;

    public $orderId, $client, $admin, $messageText, $from_id, $to_id, $type, $fee, $activity, $activity_id, $file_id, $companyFile, $comment;
    public $confirm_invoice, $reject_section, $accept_section, $saved=false;
    public $total_fee='Pending';
    public $orderStatus=false;
    public $orderDetails, $messages_sent, $messages_received, $messages, $activitie, $clientFiles, $companyFiles, $revisions=[];


    public function back()
    {
        $this->emit('update_varView', '');
    }
    public function sendInvoice()
    {
        // if (session()->get('LoggedClient')!=null) {
        //     $id = session()->get('LoggedClient');
        //     $this->from_id= $id[0];
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
            $this->from_id= $id[0];
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
            $this->from_id= $id[0];
            $this->to_id=1 ;
            $this->type= 'Client';
        }
        if (auth()->user()!=null) {
            $this->from_id=auth()->user()->id;
            $this->to_id=$this->orderDetails->client_id;
            $this->type= 'Admin';
        }
        Message::create([
            'message' => $this->messageText,
            'from_id' => $this->from_id,
            'to_id' => $this->to_id,
            'type' => $this->type,
            'is_read' => 0,
        ]);

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
                $query->where('type', 'Admin')->where('to_id', $my_id[0] );
            })->oRwhere(function ($query) use ($user_id, $my_id) {
                $query->where('from_id', $my_id[0])->where('type', 'Client');
            })->get();
            // ->latest()
            // ->take(10)
            // ->get()

            $this->activity = Activity::where(function ($query) use ($user_id, $my_id) {
                $query->where('type', 'Admin')->where('to_id', $my_id[0] );
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
            $this->revisions = RejectedOrder::where('order_id', $this->orderDetails->id)->get();
        }

        return view('livewire.client.chat-order-summary');
    }

    public function getDownload($value)
    {

        $file= 'storage/client_files/' .$value;
        return response()->download($file);

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
        }else{
            $this->reject_section=true;
        }
        $this->reject_section=true;
    }
    public function activateAcceptSection()
    {
        if ( $this->accept_section) {
            $this->accept_section=false;
        }else{
            $this->accept_section=true;
        }

    }
    public function reject($value)
    {
        $order = Order::where('order_no', $value)->first();
        $orderId = $order->id;
        if (session()->get('LoggedClient')) {
            RejectedOrder::create([
                'order_id'=>$orderId,
                'comment'=>$this->comment,
                'from'=>'client',
                'from_id'=>$this->orderDetails->client_id,
            ]);
            event( new OrderAnswerUploadEvent($this->orderDetails, $this->orderDetails->client_id));
        }
        if (auth()->user()!=null) {
            RejectedOrder::create([
                'order_id'=>$orderId,
                'comment'=>$this->comment,
                'from'=>'editor',
                'from_id'=>auth()->user()->id,
            ]);
        }
        // dd($value);
    }
    public function accept($value)
    {
        $order = Order::where('order_no', $value)->first();
        $orderId = $order->id;
        if ($this->comment == '') {
            $this->comment = 'Accepted';
        }
        if (session()->get('LoggedClient')) {
            AcceptedOrder::create([
                'order_id'=>$orderId,
                'comment'=>$this->comment,
                'from'=>'client',
                'from_id'=>$this->orderDetails->client_id,
            ]);
            $this->accept_section=false;
            session()->flash('success', 'Order Accepted Successfully.');
            // event( new OrderAnswerUploadEvent($this->orderDetails, $this->orderDetails->client_id));
        }
        if (auth()->user()!=null) {
            AcceptedOrder::create([
                'order_id'=>$orderId,
                'comment'=>$this->comment,
                'from'=>'editor',
                'from_id'=>auth()->user()->id,
            ]);
            $this->accept_section=false;
            session()->flash('success', 'Order Accepted Successfully.');
        }
        // dd($value);
    }
}
