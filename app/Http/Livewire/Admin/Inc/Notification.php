<?php

namespace App\Http\Livewire\Admin\Inc;

use App\Events\AccessGrantedEvent;
use App\Models\Activity;
use App\Models\GeneralNotification;
use App\Models\Notification as ModelsNotification;
use App\Models\Order;
use App\Models\Writer;
use App\Models\WriterRequest;
use App\Services\GeneralNotificationService;
use App\Services\NotificationService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Notification extends Component
{

    public $user_type;
    public $userTypeFro;
    public $userIdTo;
    public $user_id;
    public $modal;
    public $time_limit =0;
    public $mins;
    public $hr;
    public $status;
    public $writer_id;
    public $notification_id;

    protected $listeners = [
        'invoice-sent' => '$refresh',
        'invoice-rejected' => '$refresh',
        'invoice-accepted' => '$refresh',
        'OrderCreated' => 'newOrder',
        'client-access' => '$refresh',
        'access-granted' => '$refresh',
        'order-awarded' => '$refresh',
        'bid-created' => '$refresh',
        // 'open-order-from-notification' => 'test',
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
                ->where('is_read', 0)
                ->where('status', 'waiting')
                ->get()->count();

            $activities = ModelsNotification::
            where('toable_id', $this->user_id)
            ->where('toable_type', $this->user_type)
            ->where('is_read', 0)
            ->where('status', 'waiting')
            ->latest()
            ->get();
            $generalNotifications='';


        } elseif (auth()->user() != null) {
            $counts = ModelsNotification::
                where('toable_id', $this->user_id)
                ->where('toable_type', $this->user_type)
                ->where('is_read', 0)
                ->where(function($q) {
                    $q->where('status', 'rejected')
                    ->orWhere('status', 'waiting')
                    ->orWhere('status', 'responded');
                })
                ->latest()
                ->get()->count();

            $more = GeneralNotification::where(function ($q){
                $q->where('user_group', 'Admin_Editor')
                ->orWhere('user_group', 'Admin')
                ->orWhere('user_group', 'Editor');
            })
            ->where('is_read', 0)
            ->get()->count();

            $counts = $counts + $more;

            $activities = ModelsNotification::
            where('toable_id', $this->user_id)
            ->where('toable_type', $this->user_type)
            ->where('is_read', 0)
            ->where(function($q) {
                $q->where('status', 'rejected')
                ->orWhere('status', 'responded')
                ->orWhere('status', 'waiting');
            })
            ->latest()
            ->get();

            $generalNotifications = GeneralNotification::where(function ($q){
                $q->where('user_group', 'Admin_Editor')
                ->orWhere('user_group', 'Admin')
                ->orWhere('user_group', 'Editor');
            })
            ->where('is_read', 0)
            ->latest()->get();

        } elseif (session()->get('AuthWriter') !=null){
            $counts = ModelsNotification::
                where('toable_id', $this->user_id)
                ->where('toable_type', $this->user_type)
                ->where('is_read', 0)
                ->where(function($q) {
                    $q->where('status', 'rejected')
                    ->orWhere('status', 'waiting')
                    ->orWhere('status', 'responded');
                })
                ->get()->count();

            $more = GeneralNotification::where('user_group', 'Writer')
            ->where('is_read', 0)
            ->get()->count();

            $counts = $counts + $more;

            $activities = ModelsNotification::
            where('toable_id', $this->user_id)
            ->where('toable_type', $this->user_type)
            ->where('is_read', 0)
            ->where(function($q) {
                $q->where('status', 'rejected')
                ->orWhere('status', 'waiting')
                ->orWhere('status', 'responded');
            })
            ->latest()
            ->get();

            $generalNotifications = GeneralNotification::where('user_group', 'Writer')
            ->where('is_read', 0)
            ->latest()->get();
        }

        return view('livewire.admin.inc.notification', [
            'counts' => $counts,
            'notifications' => $activities,
            'generalNotifications' => $generalNotifications,
        ]);
    }
    public function gotToOrder($order_no, $notification_id, NotificationService $notificationService)
    {
        $mark_as_read = $notificationService->markAsRead($notification_id);
        $this->emit('open-order-from-notification', $order_no);

    }
    public function goToNewOrder($order_no, $notification_id, GeneralNotificationService $notificationService)
    {
        $notificationService->markAsRead($notification_id);
        $this->emit('open-order-from-notification', $order_no);

    }
    public function markAsRead($notification_id, NotificationService $notificationService)
    {
        $mark_as_read = $notificationService->markAsRead($notification_id);
    }
    public function markAsReadGeneral($notification_id, GeneralNotificationService $notificationService)
    {
        $notificationService->markAsRead($notification_id);
    }
    public function test($value)
    {
        dd($value);
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
    public function getWriter($id)
    {
        $writer = Writer::where('id', $id)->first();
        if ($writer) {
            return $writer->firstname ." ".$writer->lastname;
        }else {
            return 'No Name';
        }

    }
    public function giveAccess($writer_id, $notification_id)
    {
        $this->writer_id = $writer_id;
        $this->notification_id = $notification_id;
        $this->modal= "livewire.admin.components.give-writer-access-modal";
    }
    public function grantAccess(NotificationService $notificationService)
    {
        Validator::make(
            ['status' => $this->status],
            ['status' => 'required'],
            ['required' => 'The :attribute field is required'],
        )->validate();

        DB::beginTransaction();
        try {
            $request = WriterRequest::where('writer_id', $this->writer_id)
            ->where('status', 'Pending')
            ->where('is_read', 0)
            ->first();
            $request->update([
                'status' =>$this->status,
                'time_limit' =>$this->time_limit,
                'is_read' =>1
            ]);
            if ($this->status == 'Approved') {
                $title = 'Access Granted';
            } elseif($this->status == 'Declined') {
                $title = 'Access Denied';
            }
            ModelsNotification::create([
                'title'=> $title,
                'fromable_id'=>auth()->user()->id,
                'toable_id' =>$this->writer_id,
                'fromable_type' =>'App\Models\User',
                'toable_type' =>'App\Models\Writer',
                'order_no' =>$request->order->order_no,
            ]);
            $notificationService->markAsRead($this->notification_id);
            event( new AccessGrantedEvent());
            DB::commit();
            session()->flash('success-modal', 'Action Successfully!');
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('error-modal', 'Oops! Something went wrong, contact your administrator');
            //throw $th; 'Oops! Something went wrong, contact your administrator'
        }
    }
}
