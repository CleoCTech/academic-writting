<?php

namespace App\Http\Livewire\Client;

use App\Models\Order;
use Livewire\Component;

class ChatOrderSummary extends Component
{

    public $orderId;
    public $orderDetails=[];
    public function back()
    {
        $this->emitUp('update_varView', '');
    }
    public function mount()
    {
        $this->orderId = session()->get('orderId');
        $this->orderDetails = Order::where('order_no', $this->orderId)->first();
    }
    public function render()
    {
        return view('livewire.client.chat-order-summary');
    }
}