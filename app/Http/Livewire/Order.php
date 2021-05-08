<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Order extends Component
{
    protected $listeners = ['update_varView'=> 'updateVarView' ];

    public $varView;

    public function updateVarView($varValue)
    {
        $this->varView=$varValue; //looking? yenye iko na emitup
    }
    public function mount()
    {
       $this->varView;
    }
    public function render()
    {
        return view('livewire.order');
    }
}