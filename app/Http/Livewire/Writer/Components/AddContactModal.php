<?php

namespace App\Http\Livewire\Writer\Components;

use App\Http\Livewire\General\BaseModal;
use Livewire\Component;

class AddContactModal extends BaseModal
{
    public function render()
    {
        return view('livewire.writer.components.add-contact-modal');
    }
}