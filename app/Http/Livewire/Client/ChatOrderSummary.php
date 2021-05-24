<?php

namespace App\Http\Livewire\Client;

use App\Models\Activity;
use App\Models\Client;
use App\Models\ClientFile;
use App\Models\Message;
use App\Models\MessageTo;
use App\Models\Order;
use App\Models\OrderBilling;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session ;
use Livewire\Component;
use App\Traits\LayoutTrait;
use App\Traits\AdminPropertiesTrait;
use App\Traits\SearchFilterTrait;
use App\Traits\SearchTrait;

class ChatOrderSummary extends Component
{

    use LayoutTrait;
    use AdminPropertiesTrait;
    use SearchFilterTrait;
    use SearchTrait;

    public $orderId, $client, $admin, $messageText, $from_id, $to_id, $type, $fee, $activity, $activity_id, $file_id;
    public $confirm_invoice=false;
    public $total_fee='Pending';
    public $orderDetails, $messages_sent, $messages_received, $messages, $activitie, $clientFiles=[];
    public function back()
    {
        $this->emitUp('update_varView', '');
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
            'amount' => $this->fee,
            'total_amount' => ($order->pages * $this->fee),
            'prepared_by' => $this->to_id,
        ]);

        Activity::where('id', $this->activity_id)
                ->update(['status' => 'responded']);

        Order::where('id',  $order->id)
                ->update(['status' => 'In progress']);

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
                }elseif($this->activity->name == "Sent Invoice" && $this->activity->status == "responded"){
                    $this->confirm_invoice =false;
                }
            }
            $this->clientFiles = ClientFile::where('client_id', $my_id)
                                            ->where('order_id',  $this->orderDetails->id)
                                            ->get();

        }

        if (auth()->user()!=null) {

            $this->orderId = session()->get('orderId');
            $this->orderDetails = Order::with('order')
                                        ->where('order_no', $this->orderId)
                                        ->first();
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

            $this->clientFiles = ClientFile::where('client_id', $user_id)
                                            ->where('order_id',  $this->orderDetails->id)
                                            ->get();
        }

        return view('livewire.client.chat-order-summary');
    }

    public function getDownload($value, $value2)
    {
        dd($value, $value2);
         //PDF file is stored under project/public/download/info.pdf

        // $file= public_path(). "/download/info.pdf";
        // $file= $this->file_id->getFirstMediaUrl();
        // $ClientFile = ClientFile::where('id', 9)->first();
        $file= 'app/public/client_files/' .$value;
        return response()->download($file);
        // $cFiles = ClientFile::all();
        // foreach ($cFiles as $key => $cFile) {
        //     $file= $cFile->getFirstMediaPath();
        //     return response()->download($file);
        // }
        // dd('end');
        // $headers = array(
        //         'Content-Type: application/pdf',
        //         );

        // return response()->download($file);
        // return Response::download($file);
    }
}
