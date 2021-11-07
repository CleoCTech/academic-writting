<?php

namespace App\Http\Livewire\Client\Components;

use Livewire\Component;

class OrderSubmision extends Component
{
    public $orderDetails, $revisions, $clientFiles, $orderStatus, $companyFiles, $writerFiles, $messages =[];
    public $confirm_invoice;

    public function mount($orderDetails, $revisions, $clientFiles, $orderStatus, $companyFiles, $writerFiles )
    {
        $this->orderDetails = $orderDetails;
        $this->revisions = $revisions;
        // $this->confirm_invoice = $confirm_invoice;
        $this->clientFiles = $clientFiles;
        $this->orderStatus = $orderStatus;
        $this->companyFiles = $companyFiles;
        $this->writerFiles = $writerFiles;
    }
    public function render()
    {
        return view('livewire.client.components.order-submision');
    }
}
