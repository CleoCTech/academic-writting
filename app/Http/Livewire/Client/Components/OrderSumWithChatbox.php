<?php

namespace App\Http\Livewire\Client\Components;

use App\Models\Activity;
use App\Models\Client;
use App\Models\Message;
use App\Models\Msg;
use App\Models\Order;
use App\Models\OrderBilling;
use App\Models\User;
use Livewire\Component;

class OrderSumWithChatbox extends Component
{

    public $orderDetails, $revisions, $clientFiles, $messages =[];
    public $confirm_invoice = false;
    public $total_fee, $messageText, $fee;

    public function mount($orderDetails, $revisions, $clientFiles, $confirm_invoice, $messages, $total_fee )
    {
        $this->orderDetails = $orderDetails;
        $this->revisions = $revisions;
        $this->confirm_invoice = $confirm_invoice;
        $this->clientFiles = $clientFiles;
        $this->messages = $messages;
        $this->total_fee = $total_fee;
    }
    public function render()
    {
        return view('livewire.client.components.order-sum-with-chatbox');
    }
    public function sendInvoice()
    {
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
    public function sendMessage()
    {
        if (session()->get('LoggedClient')!=null) {
            // $id = session()->get('LoggedClient');
            // $this->from_id= $id;
            // $this->to_id=1 ; //picks any admin that's online;
            // $this->type= 'Client';

            // $userTo = User::where('status', 1)
            //                 ->first();
            $userTo=User::find(1);
            $userFrom = Client::find(session()->get('LoggedClient'));
            $msg = Msg::create([
                'message' => $this->messageText,
            ]);
            $userFrom->fromable()->create([
                'message_id' => $msg->id,
            ]);
            $userTo->toable()->create([
                'message_id' => $msg->id,
            ]);
        }
        if (auth()->user()!=null) {
            // $this->from_id=auth()->user()->id;
            // $this->to_id=$this->orderDetails->client_id;
            // $this->type= auth()->user()->role;
            $userFrom = User::find(auth()->user()->id);
            $userTo = Client::find($this->orderDetails->client_id);

            $msg = Msg::create([
                'message' => $this->messageText,
            ]);
            $userFrom->fromable()->create([
                'message_id' => $msg->id,
            ]);
            $userTo->toable()->create([
                'message_id' => $msg->id,
            ]);
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

    public function confrimInvoice()
    {
        // $this->emitUp('confrimInvoice');
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
    public function rejectInvoice()
    {
        // $this->emitUp('rejectInvoice');
        Activity::where('id', $this->activity_id)
                ->update(['status' => 'rejected']);
        session()->flash('Invoice-Rejected', 'Invoice has been declined. Create a new one');
    }
    public function getDownload($value)
    {
        $this->emitUp('getDownload', $value);
    }
    public function edit()
    {
        $this->emitUp('edit');
    }
}
