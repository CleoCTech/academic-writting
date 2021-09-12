<?php

namespace App\Http\Livewire\Client\Components;

use Livewire\Component;

class OrderSubmision extends Component
{
    public $orderDetails, $revisions, $clientFiles, $messages =[];
    public $confirm_invoice;

    public function mount($orderDetails, $revisions, $clientFiles, $confirm_invoice, $messages )
    {
        $this->orderDetails = $orderDetails;
        $this->revisions = $revisions;
        $this->confirm_invoice = $confirm_invoice;
        $this->clientFiles = $clientFiles;
        $this->messages = $messages;
    }
    public function render()
    {
        return view('livewire.client.components.order-submision');
    }
}
