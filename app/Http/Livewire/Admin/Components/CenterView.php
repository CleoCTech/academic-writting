<?php

namespace App\Http\Livewire\Admin\Components;

use App\Models\RejectedOrder;
use Livewire\Component;

class CenterView extends Component
{
    public $currentView;
    public function render()
    {
        $view = session()->get('view');
        if ($view=='revisions') {
            $this->currentView='revisions';
            $revisions =  RejectedOrder::where('from', 'client')
                                    ->get();

            return view('livewire.admin.components.center-view')->with(['items'=>$revisions]);
        }
        if ($view=='done revisions') {
            $this->currentView='done revisions';
            $revisions =  RejectedOrder::where('from', 'client')
            ->where('status', 'Done')
            ->get();

            return view('livewire.admin.components.center-view')->with(['items'=>$revisions]);
        }
        if ($view=='ongoing revisions') {
            $this->currentView='ongoing revisions';
            $revisions =  RejectedOrder::where('from', 'client')
            ->where('status', 'In Progress')
            ->get();

            return view('livewire.admin.components.center-view')->with(['items'=>$revisions]);
        }
    }
    public function chat($orderId)
    {
        // $this->resetFields();
        // dd($orderId);
        session()->put('orderId', $orderId);
        $this->emit('update_varView', 'chat');
        // $this->varView='chat';
    }
}