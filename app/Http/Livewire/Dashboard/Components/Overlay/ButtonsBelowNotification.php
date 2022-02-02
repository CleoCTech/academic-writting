<?php

namespace App\Http\Livewire\Dashboard\Components\Overlay;

use Livewire\Component;

class ButtonsBelowNotification extends Component
{
    public $title ='';
    public $message ='';
    public $actions = false;
    public $action1 ='';
    public $action2 ='';
    public $actionName1 ='';
    public $actionName2 ='';
    public $showNotification = false;

    public $listeners = [
        'notificationbar-refreshed' => '$refresh',
        'notificationbar-refreshed' => 'showNotification',
    ];

    public function mount($title, $message, $actions, $action1, $action2, $actionName1, $actionName2)
    {
        // dd($message);
        $this->title = $title;
        $this->message = $message;
        $this->actions = $actions;
        $this->action1 = $action1;
        $this->action2 = $action2;
        $this->actionName1 = $actionName1;
        $this->actionName2 = $actionName2;
    }
    public function render()
    {
        // dd($this->message);
        $this->showNotification();
        return view('livewire.dashboard.components.overlay.buttons-below-notification');
    }
    public function showNotification()
    {
        // sleep();
        // dd('arrived ');
        $this->showNotification = false;
    }
    public function action1($value)
    {
        $this->emit($value);
    }
    public function action2($value)
    {
        $this->emit($value);
    }
}
