<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Exception;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ClientLogout extends Component
{
    public function mount()
    {
        session()->forget('LoggedClient');
        return redirect('/');
    }

}
