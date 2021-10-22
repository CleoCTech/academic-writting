<?php

namespace App\Listeners;

use App\Events\ClientHasLoggedInEvent;
use App\Events\OrderRegisteredEvent;
use App\Models\Order;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateOrderListener
{
    public $category_id, $order_no, $client_id, $topic, $pages, $deadline_date, $deadline_time, $instructions, $status='';

    public function handle($event)
    {
        if (session()->has('Order')) {
            foreach (session('Order') as $key => $value)
            {
                if($value['type']=='order_no'){
                    $this->order_no = $value['message'];
                }
                if($value['type']=='subject_id'){
                    $this->category_id = $value['message'];
                }
                if($value['type']=='topic'){
                    $this->topic = $value['message'];
                }
                if($value['type']=='pages'){
                    $this->pages = $value['message'];
                }
                if($value['type']=='deadline_date'){
                    $this->deadline_date = $value['message'];
                }
                if($value['type']=='deadline_time'){
                    $this->deadline_time = $value['message'];
                }
                if($value['type']=='instructions'){
                    $this->instructions = $value['message'];
                }
                if($value['type']=='status'){
                    $this->status = $value['message'];
                }
            }
        }

        $order = Order::Create([
            'order_no'=>$this->order_no,
            'client_id' => $event->client->id,
            'subject_id'=>$this->category_id,
            'topic'=>$this->topic,
            'pages'=>$this->pages,
            'deadline_date'=>$this->deadline_date,
            'deadline_time'=>$this->deadline_time,
            'instructions'=>$this->instructions,
            'status'=>$this->status
        ]);
        session()->forget('Order');
        // event( new ClientHasLoggedInEvent($event->client->email, $event->client->password));
        event( new OrderRegisteredEvent($order, $event->client->id));
    }
}