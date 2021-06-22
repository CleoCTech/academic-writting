<?php

namespace App\Http\Livewire\Writer\Settings;

use Livewire\Component;

class IdBack extends Component
{
    public function render()
    {
        return view('livewire.writer.settings.id-back');
    }
    public function settings($component)
    {
        $this->emit('component', $component);
    }
}