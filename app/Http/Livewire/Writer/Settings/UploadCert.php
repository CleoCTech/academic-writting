<?php

namespace App\Http\Livewire\Writer\Settings;

use Livewire\Component;

class UploadCert extends Component
{
    public function render()
    {
        return view('livewire.writer.settings.upload-cert');
    }
    public function settings($component)
    {
        $this->emit('component', $component);
    }
}
