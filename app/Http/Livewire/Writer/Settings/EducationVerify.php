<?php

namespace App\Http\Livewire\Writer\Settings;

use Livewire\Component;

class EducationVerify extends Component
{
    public function render()
    {
        return view('livewire.writer.settings.education-verify');
    }
    public function settings($component)
    {
        $this->emit('component', $component);
    }
}
