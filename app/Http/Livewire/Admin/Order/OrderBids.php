<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use App\Models\WriterBid;
use Livewire\Component;

class OrderBids extends Component
{
    public $bidders =[];
    public $oderId;
    public $modal;
    public $orderDetails;

    public function mount()
    {
        $this->oderId = session()->pull('orderId');
        // dd($this->oderId);
        $this->orderDetails = Order::where('id', $this->oderId)
                                    ->first();
        $this->bidders = WriterBid::where('order_id', $this->oderId)
                                    ->get();
    }
    public function render()
    {
        return view('livewire.admin.order.order-bids');
    }
    public function bidDetails($id)
    {
        session()->put('orderId', $id);
        $this->emitUp('update_CenterView', 'bid-details');
    }
}