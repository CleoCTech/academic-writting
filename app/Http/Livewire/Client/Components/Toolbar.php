<?php

namespace App\Http\Livewire\Client\Components;

use Livewire\Component;

class Toolbar extends Component
{
    public $confirm_invoice =false;
    public function mount($confirm_invoice)
    {
        $this->confirm_invoice= $confirm_invoice;
    }
    public function render()
    {
        return view('livewire.client.components.toolbar');
    }
    public function back()
    {
        $this->emitUp('back');
    }
}