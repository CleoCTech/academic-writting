<?php

namespace App\Http\Livewire\Writer\Settings;

use Livewire\Component;

class IdFront extends Component
{
    public function render()
    {
        return view('livewire.writer.settings.id-front');
    }
    public function settings($component)
    {
        $this->emit('component', $component);
    }
}
