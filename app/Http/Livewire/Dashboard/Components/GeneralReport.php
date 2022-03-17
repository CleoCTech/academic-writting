<?php

namespace App\Http\Livewire\Dashboard\Components;

use App\Models\Order;
use App\Models\OrderBilling;
use Livewire\Component;

class GeneralReport extends Component
{

    public function render()
    {
        if (session()->get('LoggedClient')!=null) {
            $pending_orders = Order::where('status', 'Pending')
            ->where('client_id', session()->get('LoggedClient'))
            ->get()->count();
            $active_orders = Order::where('status', 'In progress')
            ->where('client_id', session()->get('LoggedClient'))
            ->get()->count();
            $all_orders = Order::where('status', '!=', 'Pending')
            ->where('client_id', session()->get('LoggedClient'))
            ->get()->count();
            $total_spent = OrderBilling::where('client_id', session()->get('LoggedClient'))
            ->sum('total_amount');

            return view('livewire.dashboard.components.general-report', [
                'pending_orders' => $pending_orders,
                'active_orders' => $active_orders,
                'all_orders' => $all_orders,
                'total_spent' => $total_spent,
            ]);

        }
    }
    public function pendingOrders()
    {
        $this->emit('update_varView', 'pending-orders');
    }
    public function progress()
    {
        $this->emit('update_varView', 'progress');
    }
    public function revisions()
    {
        $this->emit('update_varView', 'revisions');
    }
    public function completed()
    {
        $this->emit('update_varView', 'completed');
    }
    public function transactions()
    {
        // $this->emit('update_varView', 'completed');
    }
    public function allorders()
    {
        // $this->emit('update_varView', 'completed');
    }
}
