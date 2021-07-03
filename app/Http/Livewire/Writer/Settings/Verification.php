<?php

namespace App\Http\Livewire\Writer\Settings;

use Livewire\Component;

class Verification extends Component
{
    public $identityId;
    public function render()
    {
        return view('livewire.writer.settings.verification');
    }
    public function settings($target)
    {
        session()->forget('files');
        session()->put('identityId', $this->identityId);
        $this->emit('component', $target);
    }
}