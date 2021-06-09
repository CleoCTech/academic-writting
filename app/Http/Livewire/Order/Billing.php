<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;

class Billing extends Component
{
    public $clientId;
    public function back()
    {
        $this->emitUp('go_back', '');
    }
    public function mount()
    {
        $this->clientId = session()->get('client_id');
    }
    public function pay()
    {
        session()->forget('payment');
        $value = session()->get('payment');
        while ($value == null) {
            $value = session()->get('payment');
        }
    }
    public function render()
    {
        return view('livewire.order.billing');
    }
}