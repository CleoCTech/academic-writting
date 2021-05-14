<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderRegisteredEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order, $client_id='';
    public function __construct($order, $client_id)
    {
        $this->order=$order;
        $this->client_id=$client_id;
    }

}