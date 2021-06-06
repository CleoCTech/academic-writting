<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use App\Models\OrderBilling;
use Livewire\Component;

class CheckOrder extends Component
{

    public $orderDetails = [];

    public function back()
    {
        $this->emitUp('go_back', '');
    }
    public function render()
    {
        if (session()->get('billId')!=null) {
            $orderId = OrderBilling::where('id', session()->get('billId'))->first();
            $this->orderDetails = Order::where('id', $orderId->order_id)->first();
        }
        return view('livewire.order.check-order');
    }
    public function checkOut()
    {
        session()->put('client_id', $this->orderDetails['client_id']);
        $this->emitUp('go_back', 'checkout');
    }

}
