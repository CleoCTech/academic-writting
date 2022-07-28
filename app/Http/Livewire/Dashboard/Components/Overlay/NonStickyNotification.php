<?php

namespace App\Http\Livewire\Dashboard\Components\Overlay;

use Livewire\Component;

class NonStickyNotification extends Component
{
    public $message = 'Test message';
    public $showNotification = false;

    public $listeners = [
        'non-sticky-notification' => 'showNotification',
    ];

    public function render()
    {
        // $this->showNotification('');
        return view('livewire.dashboard.components.overlay.non-sticky-notification');
    }

    public function showNotification($message)
    {
        // dd('here');
        $this->showNotification = true;
        $this->message = $message;
    }
}
