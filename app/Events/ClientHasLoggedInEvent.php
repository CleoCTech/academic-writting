<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ClientHasLoggedInEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $email, $password ='';
    public function __construct($email, $password)
    {
        $this->email=$email;
        $this->password=$password;
    }

}