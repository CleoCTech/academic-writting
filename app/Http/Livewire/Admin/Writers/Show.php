<?php

namespace App\Http\Livewire\Admin\Writers;

use App\Services\Accounting\AccountService;
use App\Services\WriterService;
use App\Traits\SearchFilterTrait;
use App\Traits\SearchTrait;
use App\Traits\AdminPropertiesTrait;
use App\Traits\LayoutTrait;
use Livewire\Component;

class Show extends Component
{
    use LayoutTrait;
    use AdminPropertiesTrait;
    use SearchFilterTrait;
    use SearchTrait;

    public $writer_id;

    public function mount($id)
    {
        $this->pageTitle = "Writer's Summary";
        $this->xScope = "xCurrent";
        $this->writer_id = $id;
    }
    public function render(WriterService $writerService, AccountService $accountService)
    {
        $writer = $writerService->getWriter($this->writer_id);
        $totalOrders = $writerService->getTotalOrders($this->writer_id);
        $activeOrders = $writerService->getActiveOrders($this->writer_id);
        $totalRevisions = $writerService->getRevisionOrders($this->writer_id);
        $totalEarned = $writerService->getTotalEarned($this->writer_id, $accountService);
        $balance = $writerService->getCurrentEarned($this->writer_id, $accountService);
        return view('livewire.admin.writers.show', [
            'writer' => $writer,
            'balance' => $balance,
            'totalOrders' => $totalOrders,
            'activeOrders' => $activeOrders,
            'totalRevisions' => $totalRevisions,
            'totalEarned' => $totalEarned,
        ]);
    }
    public function activateAccount()
    {
        session()->put('viewId', $this->writer_id);
        session()->put('varView', 'application-details');
        $this->emit('varView', 'application-details');
        redirect()->route('applications');
    }
    public function deactivateAccount()
    {
        session()->put('viewId', $this->writer_id);
        session()->put('varView', 'application-details');
        $this->emit('varView', 'application-details');
        redirect()->route('applications');
    }
    public function back()
    {
        $this->emit('update_W_list_varView', '');
    }
}