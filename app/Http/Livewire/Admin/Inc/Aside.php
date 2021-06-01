<?php

namespace App\Http\Livewire\Admin\Inc;

use Livewire\Component;

class Aside extends Component
{


    public function render()
    {
        return view('livewire.admin.inc.aside');
    }
    public function jobs()
    {
        // dd("jobs");
        $this->emitUp('update_varView', 'jobs');
    }
    public function invoice()
    {
        $this->emitUp('update_varView', 'invoice');
    }

}