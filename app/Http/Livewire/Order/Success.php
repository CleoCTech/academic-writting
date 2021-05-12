<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;

class Success extends Component
{
    public function render()
    {
        return view('livewire.order.success');
    }
    public function previousStep()
    {
        $this->emitUp('update_varView', '');
    }
}