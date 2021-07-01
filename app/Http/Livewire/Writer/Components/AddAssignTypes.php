<?php

namespace App\Http\Livewire\Writer\Components;

use App\Models\PaperCategory;
use Livewire\Component;

class AddAssignTypes extends Component
{
    public $cats = [];
    public function render()
    {
        $casts = PaperCategory::all();
        return view('livewire.writer.components.add-assign-types')->with(['cats'=> $casts]);
    }
}
