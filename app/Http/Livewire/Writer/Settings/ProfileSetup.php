<?php

namespace App\Http\Livewire\Writer\Settings;

use Livewire\Component;

class ProfileSetup extends Component
{
    public function render()
    {
        return view('livewire.writer.settings.profile-setup');
    }
    public function settings()
    {
        $this->emit('component', '');
    }
}