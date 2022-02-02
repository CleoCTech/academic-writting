<?php

namespace App\Http\Livewire\Dashboard\Inc;

use Livewire\Component;

class SideMenu extends Component
{
    public function render()
    {
        return view('livewire.dashboard.inc.side-menu');
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
}
