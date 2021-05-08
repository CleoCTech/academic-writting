<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;

class WritterOffers extends Component
{
    public function store()
    {
        //store fields in session
        //go to next view
        $this->emitUp('update_varView', 'step3');
    }
    public function previousStep()
    {
        $this->emitUp('update_varView', '');
    }
    public function render()
    {
        return view('livewire.order.writter-offers');
    }
}