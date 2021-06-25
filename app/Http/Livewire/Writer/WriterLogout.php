<?php

namespace App\Http\Livewire\Writer;

use Livewire\Component;

class WriterLogout extends Component
{
    public function mount()
    {
        session()->forget('AuthWriter');
        return redirect('/');
    }

}
