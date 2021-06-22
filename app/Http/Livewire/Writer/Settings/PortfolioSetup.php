<?php

namespace App\Http\Livewire\Writer\Settings;

use Livewire\Component;

class PortfolioSetup extends Component
{
    public function render()
    {
        return view('livewire.writer.settings.portfolio-setup');
    }
    public function settings()
    {
        $this->emit('component', '');
    }
}