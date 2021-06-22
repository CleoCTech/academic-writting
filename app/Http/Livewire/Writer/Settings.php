<?php

namespace App\Http\Livewire\Writer;

use Livewire\Component;

class Settings extends Component
{
    public $component;
    protected $listeners = ['component'=> 'updateComponent'];

    public function updateComponent($component)
    {
        $this->component = $component;
    }
    public function render()
    {
        return view('livewire.writer.settings')->layout('layouts.client');;
    }
}
