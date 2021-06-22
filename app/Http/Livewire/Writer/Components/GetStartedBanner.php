<?php

namespace App\Http\Livewire\Writer\Components;

use Livewire\Component;

class GetStartedBanner extends Component
{
    public $email;
    public function login()
    {
        session()->forget('email');
        session()->forget('varView');

        session()->put('varView', 'create-account');
        session()->put('email', $this->email);
        $this->emit('varView', 'create-account');
        return redirect()->route('writer-login');
    }
    public function render()
    {
        return view('livewire.writer.components.get-started-banner');
    }
}