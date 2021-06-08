<?php

namespace App\Listeners;

use App\Models\Client;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CheckClientEmailListener
{
    
    public function handle($event)
    {
        try {
            $user = Client::where('email', $event->client_email)->firstOrFail();
            session()->put('Email-Check', $user->email);
        } catch (Exception $th) {
            return false;
        }
    }
}