<?php

namespace App\Http\Livewire\Writer;

use App\Models\Writer;
use Livewire\Component;

class Dashboard extends Component
{

    public function mount()
    {
        $status = Writer::where('id', session()->get('AuthWriter'))->first();
        if ($status) {
            if ( $status->status != "Active") {
                return redirect()->route('writer-settings');
                session()->flash('error', 'Account Under Review');
            }
        }else{
            return;
        }
    }
    public function render()
    {
        return view('livewire.writer.dashboard')->layout('layouts.client');

    }
}
