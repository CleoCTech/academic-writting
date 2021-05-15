<?php

namespace App\Listeners;

use App\Models\Client;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AuthClientListener
{

    public function handle($event)
    {

        $client = Client::where('email', $event->email)->first();
        if ($client) {
            session()->push('LoggedClient', $client->id);
            return redirect('client/dashboard');
        }else{
            dd('not found');
        }
    }
}