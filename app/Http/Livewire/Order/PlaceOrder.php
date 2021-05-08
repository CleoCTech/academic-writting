<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;

class PlaceOrder extends Component
{

    public function store()
    {
        //store fields in session
        //go to next view
        $this->emitUp('update_varView', 'step2');
    }
    public function render()
    {
        return view('livewire.order.place-order');
    }
}