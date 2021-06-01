<?php

namespace App\Http\Livewire\Client\Components;

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
                                    ->where('from_id', session()->get('LoggedClient'))
                                    ->get();

            return view('livewire.client.components.center-view')->with(['items'=>$revisions]);
        }
        if ($view=='done revisions') {
            $this->currentView='done revisions';
            $revisions =  RejectedOrder::where('from', 'client')
            ->where('status', 'Done')
            ->where('from_id', session()->get('LoggedClient'))
            ->get();

            return view('livewire.client.components.center-view')->with(['items'=>$revisions]);
        }
        if ($view=='ongoing revisions') {
            $this->currentView='ongoing revisions';
            $revisions =  RejectedOrder::where('from', 'client')
            ->where('status', 'In Progress')
            ->where('from_id', session()->get('LoggedClient'))
            ->get();

            return view('livewire.client.components.center-view')->with(['items'=>$revisions]);
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