<?php

namespace App\Http\Livewire\General;

use Livewire\Component;

class BaseModal extends Component
{

    public $show = false;

    protected $listeners = [
        'show' => 'show'
    ];

    public function show(){
        $this->show = true;
    }
}
