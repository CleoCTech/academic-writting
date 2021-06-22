<?php

namespace App\Http\Livewire\Writer\Settings;

use Livewire\Component;

class Progress extends Component
{

    public function render()
    {
        return view('livewire.writer.settings.progress');
    }

    public function settings($component)
    {
        $this->emit('component', $component);
    }
}
