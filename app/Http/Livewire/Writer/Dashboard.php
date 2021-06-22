<?php

namespace App\Http\Livewire\Writer;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.writer.dashboard')->layout('layouts.client');
    
    }
}