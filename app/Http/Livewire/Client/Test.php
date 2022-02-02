<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class Test extends Component
{

    protected $listeners = [
        'open_eye' => 'eye',
        'open-order-from-notification'=> 'test',
    ];

    public function render()
    {
        return view('livewire.client.test');
    }
    public function test($value)
    {
        dd('From test component'. $value);
    }
    public function eye()
    {
        dd('Test View: open eye');
    }
}