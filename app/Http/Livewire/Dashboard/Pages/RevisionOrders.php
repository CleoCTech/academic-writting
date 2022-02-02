<?php

namespace App\Http\Livewire\Dashboard\Pages;

use App\Traits\AdminPropertiesTrait;
use App\Traits\LayoutTrait;
use App\Traits\SearchFilterTrait;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;
use App\Models\Order;
use Livewire\Component;

class RevisionOrders extends Component
{
    use LayoutTrait;
    use AdminPropertiesTrait;
    use SearchFilterTrait;
    use SearchFilterTrait;
    use WithPagination;

    public function render()
    {

        $revisions = Order::whereHas('revisions', function ($query){
            $query->where('from', 'client');
        })
        ->with('revisions')
        ->where('client_id', session()->get('LoggedClient'))
        ->paginate(10);

        return view('livewire.dashboard.pages.revision-orders', [
            'revisions'=>$revisions,
        ])->layout('layouts.moderndashboard');
    }
    public function back()
    {
        $this->emit('update_varView', '');
    }
    public function chat($value)
    {
        $this->emit('Incoming-Request', $value);
    }
}