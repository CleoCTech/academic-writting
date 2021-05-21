<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use App\Models\Message;
use App\Models\MessageTo;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ChatOrderSummary extends Component
{

    public $orderId, $client, $admin, $messageText, $from_id, $to_id, $type;
    public $orderDetails, $messages_sent, $messages_received, $messages=[];
    public function back()
    {
        $this->emitUp('update_varView', '');
    }
    // public function mount()
    // {
    //     //check which user that need this component
    //     if (session()->get('LoggedClient')) {

    //         $this->orderId = session()->get('orderId');
    //         $this->orderDetails = Order::with('order')
    //                                     ->where('order_no', $this->orderId)
    //                                     ->first();
    //         $user_id = 'Client';
    //         $my_id = session()->get('LoggedClient');
    //         $this->client = session()->pull('LoggedClient');
    //         // Message::where(['from_id' => $user_id, 'to_id' => $my_id])->update(['is_read' => 1]);
    //         // Get all message from selected user
    //         $this->messages = Message::where(function ($query) use ($user_id, $my_id) {
    //             $query->where('type', 'Admin')->where('to_id', $my_id );
    //         })->oRwhere(function ($query) use ($user_id, $my_id) {
    //             $query->where('from_id', $my_id)->where('type', 'Client');
    //         })->get();
    //         // d();

    //     }

    //     if (auth()->user()!=null) {

    //         $this->orderId = session()->get('orderId');
    //         $this->orderDetails = Order::with('order')
    //                                     ->where('order_no', $this->orderId)
    //                                     ->first();
    //         $user_id =$this->orderDetails->client_id;
    //         $my_id = auth()->user()->id;
    //         // Message::where(['from_id' => $user_id, 'to_id' => $my_id])->update(['is_read' => 1]);
    //         // Get all message from selected user
    //         $this->messages = Message::where(function ($query) use ($user_id, $my_id) {
    //             $query->where('from_id', $user_id)->where('to_id', $my_id);
    //         })->oRwhere(function ($query) use ($user_id, $my_id) {
    //             $query->where('from_id', $my_id)->where('to_id', $user_id);
    //         })->get();
    //     }

    // }
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
        }

        if (auth()->user()!=null) {

            $this->orderId = session()->get('orderId');
            $this->orderDetails = Order::with('order')
                                        ->where('order_no', $this->orderId)
                                        ->first();
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
        }

        return view('livewire.client.chat-order-summary');
    }
}
