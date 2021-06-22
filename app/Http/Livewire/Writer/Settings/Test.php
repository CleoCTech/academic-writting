<?php

namespace App\Http\Livewire\Writer\Settings;

use Livewire\Component;

class Test extends Component
{
    public function render()
    {
        return view('livewire.writer.settings.test');
    }
    public function settings($component)
    {
        $this->emit('component', $component);
    }
}
