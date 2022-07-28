<?php

namespace App\Http\Livewire\Dashboard\Components\Overlay;

use App\Events\InvoiceAcceptedEvent;
use App\Events\InvoiceRejectedEvent;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderBilling;
use Livewire\Component;
use App\Services\InvoiceService;

class InvoiceNotification extends Component
{
    public $user_type;
    public $userTypeFro;
    public $userIdTo;
    public $notification;
    public $showNotification = false;

    public $listeners = [
        'invoice-sent' => '$refresh',
        'invoice-rejected' => '$refresh',
        'invoice-accepted' => '$refresh',
        'OrderCreated' => 'newOrder',
        // 'notificationbar-refreshed' => '$refresh',
        'invoice-sent' => 'showNotification',
    ];

    // public function mount($user_id, $user_type)
    // {
    //     $this->user_id = $user_id;
    //     $this->user_type = $user_type;
    // }
    public function render()
    {
        // dd('refreshed');
        if (session()->get('LoggedClient') != null) {
            $this->notification = Notification::
                where('toable_type', 'App\Models\Client')
                ->where('toable_id', session()->get('LoggedClient'))
                ->where('is_read', 0)
                ->where('title', 'Sent Invoice')
                ->where('status', 'waiting')
                ->latest()
                ->first();
            if ($this->notification == null) {
                $this->showNotification = true;
            }
        }
        return view('livewire.dashboard.components.overlay.invoice-notification', [

        ]);
    }
    public function showNotification()
    {
        $this->showNotification = false;
    }
    public function rejectInvoice(InvoiceService $invoiceService)
    {
        $reject = $invoiceService->rejetcInvoice($this->notification);
        if ($reject) {
            event(new InvoiceRejectedEvent());
        }

    }
    public function confirmInvoice(InvoiceService $invoiceService)
    {
        $confirm = $invoiceService->confirmInvoice($this->notification);
        if ($confirm) {
            session()->flash('success', 'Invoice Confirmed successfully.');

            event(new InvoiceAcceptedEvent());
        }
    }
}
