<?php

namespace App\Http\Livewire\Writer\Components;

use Livewire\Component;

class ResendLink extends Component
{

    public function registration()
    {
        $this->emit('centerView', 'default');
    }
    public function render()
    {
        return view('livewire.writer.components.resend-link');
    }
}
