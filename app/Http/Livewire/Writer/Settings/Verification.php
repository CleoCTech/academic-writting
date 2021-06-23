<?php

namespace App\Http\Livewire\Writer\Settings;

use Livewire\Component;

class Verification extends Component
{
    public function render()
    {
        return view('livewire.writer.settings.verification');
    }
    public function settings()
    {
        $this->emit('component', '');
    }
}