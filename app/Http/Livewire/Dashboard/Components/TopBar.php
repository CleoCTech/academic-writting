<?php

namespace App\Http\Livewire\Dashboard\Components;

use App\Events\NoticationTopBarRefreshedEvent;
use App\Models\Client;
use App\Models\Writer;
use App\Models\User;
use App\Models\Messaging;
use App\Models\Notification;
use App\Services\NotificationService;
use Livewire\Component;

class TopBar extends Component
{
    public $user_type;
    public $userTypeFro;
    public $userIdTo;
    public $user_id;
    public $activity;

    public $listeners = [
        'messageAdded' => '$refresh',
        'order-submitted' => '$refresh',
        // 'invoice-sent' => '$refresh',
        // 'activity-refreshed' => 'mount',
        'activity-refreshed' => '$refresh',
        'fire-notification-bar' => 'fireNotificationBar',
    ];

    public $client=[];

    public function mount($user_id, $user_type, $activity)
    {
        // dd('refreshed-mount');
        $this->user_id = $user_id;
        $this->user_type = $user_type;
        $this->activity = $activity;
        if (session()->get('AuthWriter') !=null) {
            $this->client = Writer::where('id', session()->get('AuthWriter'))->first();
            if (!$this->client->status == "Pending") {
                $this->account_status = true;
            }
        } elseif(session()->get('LoggedClient') !=null) {
            $this->client = Client::where('id', session()->get('LoggedClient'))->first();
        }

    }

    public function render()
    {
        if (auth()->user() !=null) {
            $counts = Messaging::
            whereHasMorph('toable', [$this->user_type], function($query){
                $query->where('toable_id', auth()->user()->id);
            })
            ->where('is_read', 0)
            ->get()->count();
            $receivedMsgs = Messaging::
            whereHasMorph('toable', [$this->user_type], function($query){
                $query->where('toable_id', auth()->user()->id);
            })
            ->where('is_read', 0)
            ->get();
        } elseif (session()->get('LoggedClient')!=null){
            $counts = Messaging::
            whereHasMorph('toable', [$this->user_type], function($query){
                $query->where('toable_id', session()->get('LoggedClient'));
            })
            ->where('is_read', 0)
            ->get()->count();
            $receivedMsgs = Messaging::
            whereHasMorph('toable', [$this->user_type], function($query){
                $query->where('toable_id', session()->get('LoggedClient'));
            })
            ->where('is_read', 0)
            ->get();

            //notifications
            $notificationsCounts = Notification::
            where('toable_id', session()->get('LoggedClient'))
            ->where('toable_type', $this->user_type)
            ->where('is_read', 0)
            ->where('status', 'waiting')
            ->get()->count();

            $notifications = Notification::
            where('toable_id', session()->get('LoggedClient'))
            ->where('toable_type', $this->user_type)
            ->where('is_read', 0)
            ->where('status', 'waiting')
            ->latest()
            ->get();

        } elseif ((session()->get('AuthWriter') != null)){
            $counts = Messaging::
            whereHasMorph('toable', [$this->user_type], function($query){
                $query->where('toable_id', session()->get('AuthWriter'));
            })
            ->where('is_read', 0)
            ->get()->count();
            $receivedMsgs = Messaging::
            whereHasMorph('toable', [$this->user_type], function($query){
                $query->where('toable_id', session()->get('AuthWriter'));
            })
            ->where('is_read', 0)
            ->get();
        }
        // $this->fireNotificationBar();
        return view('livewire.dashboard.components.top-bar', [
            'count'=>$counts,
            'receivedMsgs'=>$receivedMsgs,
            'notificationsCounts'=>$notificationsCounts,
            'notifications'=>$notifications,
        ]);
    }
    public function fireNotificationBar()
    {
        // sleep(3);
        // dd('reached kwa topbar');
        event(new NoticationTopBarRefreshedEvent());
    }
    public function getUsername($userId, $userType)
    {
        if ($userType == 'App\Models\Client') {
                $getClient = Client::where('id', $userId)->first();
                return $getClient->username;
        }elseif($userType == 'App\Models\User'){
                $getClient = User::where('id', $userId)->first();
                return $getClient->name;
        }elseif ($userType == 'App\Models\Writer') {
                $getClient = Writer::where('id', $userId)->first();
                return $getClient->firstname;
        }
    }
   public function getId($userId, $userType)
   {
       if ($userType == 'App\Models\Client') {
            $getClient = Client::where('id', $userId)->first();
            $this->userTypeFro = $userType;
            return $getClient->id;
            // return  [$getClient->id, $userType];
       }elseif($userType == 'App\Models\User'){
            $getClient = User::where('id', $userId)->first();
            $this->userTypeFro = $userType;
            return $getClient->id;
            // return  [$getClient->id, $userType];
       }elseif ($userType == 'App\Models\Writer') {
            $getClient = Writer::where('id', $userId)->first();
            $this->userTypeFro = $userType;
            return $getClient->id;
            // return  [$getClient->id, $userType];
       }
   }
   public function chatbox($fromable_type, $user_id_from)
   {
        $model = explode("Models",$fromable_type);
        $model = $model[0]."\\Models\\".$model[1];

        session()->put('userIdN', $user_id_from);
        session()->put('userTypeFro', $model);

        if (auth()->user()!=null) {
            return redirect()->route('admin-chat');
        }elseif(session()->get('LoggedClient')!=null){
            return redirect()->route('c-chat');
        }elseif(session()->get('AuthWriter') != null){
            return redirect()->route('writer-chat');
        }


   }
   public function gotToOrder($order_no, $notification_id, NotificationService $notificationService)
   {
        $mark_as_read = $notificationService->markAsRead($notification_id);
        $this->emit('Incoming-Request', $order_no);
   }
   public function profile()
   {
        $this->emit('update_varView', 'profile');
   }
}