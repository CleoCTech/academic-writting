<?php

namespace App\Http\Livewire\Admin\Inc;

use App\Models\Activity;
use App\Models\Notification as ModelsNotification;
use App\Models\Order;
use Livewire\Component;

class Notification extends Component
{
    public $user_type;
    public $userTypeFro;
    public $userIdTo;
    public $user_id;

    protected $listeners = [
        'invoice-sent' => '$refresh',
        'OrderCreated' => 'newOrder',
    ];


    public function mount($user_id, $user_type)
    {
        $this->user_id = $user_id;
        $this->user_type = $user_type;
    }
    public function render()
    {
        if (session()->get('LoggedClient') != null) {
            $counts = ModelsNotification::
                where('toable_id', $this->user_id)
                ->where('toable_type', $this->user_type)
                ->where('status', 'waiting')
                ->get()->count();

            $activities = ModelsNotification::
            where('toable_id', $this->user_id)
            ->where('toable_type', $this->user_type)
            ->where('status', 'waiting')
            ->get();


        } elseif (auth()->user() != null) {
            $counts = ModelsNotification::
                where('fromable_id', $this->user_id)
                ->where('fromable_type', $this->user_type)
                ->where('status', 'rejected')
                ->whereOr('status', 'responded')
                ->get()->count();

            $activities = ModelsNotification::
            where('fromable_id', $this->user_id)
            ->where('fromable_type', $this->user_type)
            ->where('status', 'rejected')
            ->whereOr('status', 'responded')
            ->get();
        } elseif (session()->get('AuthWriter') !=null){
            $counts = ModelsNotification::
                where('fromable_id', $this->user_id)
                ->where('fromable_type', $this->user_type)
                ->where('status', 'rejected')
                ->whereOr('status', 'responded')
                ->get()->count();

            $activities = ModelsNotification::
            where('fromable_id', $this->user_id)
            ->where('fromable_type', $this->user_type)
            ->where('status', 'rejected')
            ->whereOr('status', 'responded')
            ->get();
        }

        return view('livewire.admin.inc.notification', [
            'counts' => $counts,
            'notifications' => $activities,
        ]);
    }
    public function gotToOrder($order_no)
    {
        // $order = Order::where('order_no', $order_no)->first();
        $this->emit('Incoming-Request', $order_no);
    }
    public function checkActivities()
    {
        $activities = ModelsNotification::
        where('toable_id', $this->user_id)
        ->where('toable_type', $this->user_type)
        ->get();

    }
    public function newOrder()
    {
        $this->alert('success', 'You have new order', [
            'position' =>  'center',
            'timer' =>  5000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
       ]);
    }
}