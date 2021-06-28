<?php

namespace App\Http\Livewire\Writer\Components;

use App\Http\Livewire\General\BaseModal;
use App\Traits\DeleteTrait;
use Livewire\Component;

class DeleteModal extends Component
{
    use DeleteTrait;
    public $deleteId;
    protected $listeners = ['deleteId' => 'getIdToDelete'];

    // public function getIdToDelete($id)
    // {
    //     $this->deleteId = $id;
    // }
    public function render()
    {
        return view('livewire.writer.components.delete-modal');
    }
}
