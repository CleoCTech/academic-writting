<?php

namespace App\Http\Livewire\Admin\Clients;

use App\Models\Client;
use App\Models\Order;
use App\Models\OrderBilling;
use App\Services\ClientService;
use Livewire\Component;
use App\Traits\SearchFilterTrait;
use App\Traits\SearchTrait;
use App\Traits\AdminPropertiesTrait;
use App\Traits\LayoutTrait;

class Show extends Component
{

    use LayoutTrait;
    use AdminPropertiesTrait;
    use SearchFilterTrait;
    use SearchTrait;

    public $client_id;

    public function mount($id)
    {
        $this->pageTitle = "Client's Summary";
        $this->xScope = "xCurrent";
        $this->client_id = $id;
    }
    public function render()
    {
        $client = Client::where("id", $this->client_id)->first();
        $totalOrders = Order::where('client_id', $this->client_id)->get()->count();
        $pendingOrders = Order::where('client_id', $this->client_id)
        ->where('status', 'Pending')
        ->get()->count();
        $activeOrders = Order::where('client_id', $this->client_id)
        ->where('status', 'In progress')
        ->get()->count();
        $totalSpent = OrderBilling::where('client_id', $this->client_id)
        ->sum('total_amount');
        $getBalance = OrderBilling::where('client_id', $this->client_id)
        ->sum('paid_amount');
        $balance = $totalSpent - $getBalance;
        return view('livewire.admin.clients.show',[
            'client' => $client,
            'totalOrders' => $totalOrders,
            'pendingOrders' => $pendingOrders,
            'activeOrders' => $activeOrders,
            'totalSpent' => $totalSpent,
            'balance' => $balance,
        ]);
    }
    public function back()
    {
        $this->emit('update_C_list_varView', '');
    }
    public function deactivateAccount(ClientService $clientService)
    {
        $clientService->deactivateAccount($this->client_id);
        session()->flash('success', 'Deactivated Successfully');
    }
    public function activateAccount(ClientService $clientService)
    {
        $clientService->activateAccount($this->client_id);
        session()->flash('success', 'Activated Successfully');
    }
}