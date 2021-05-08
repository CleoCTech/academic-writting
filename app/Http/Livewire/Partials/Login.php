<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;

class Login extends Component
{
    public $isOpen = false;
    protected $listeners = ['toggleModal' => 'toggle'];

    public function toggle()
    {
        if ($this->isOpen) {
            $this->isOpen = false;
        } else {
            $this->isOpen = true;
        }
    }
    public function render()
    {
        return view('livewire.partials.login');
    }
}
