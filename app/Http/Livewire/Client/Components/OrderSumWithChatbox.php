<?php

namespace App\Http\Livewire\Client\Components;

use App\Events\InvoiceSentEvent;
use App\Events\MessageSentEvent;
use App\Models\Activity;
use App\Models\Client;
use App\Models\Messaging;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderBilling;
use App\Models\User;
use App\Services\InvoiceService;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class OrderSumWithChatbox extends Component
{

    public $orderDetails, $revisions, $clientFiles, $messages =[];
    public $confirm_invoice = false;
    public $total_fee, $messageText, $fee, $user_type;
    public $orderId;
    public $client_Id;
    public $userType;
    public $openId;
    public $users = [];
    public $from_id;
    public $from_type;
    public $sendMessageTo;
    public $modal;

    protected $listeners = [
        'messageAdded' => '$refresh'
    ];

    public function mount($orderDetails, $revisions, $clientFiles, $confirm_invoice, $total_fee, $user_type, $orderId )
    {
        $this->orderDetails = $orderDetails;
        $this->revisions = $revisions;
        $this->confirm_invoice = $confirm_invoice;
        $this->clientFiles = $clientFiles;
        $this->total_fee = $total_fee;
        $this->user_type = $user_type;
        $this->orderId = $orderId;

        //get client with this order ($this->orderId) //only one user that is binded to this order_no;
        $client_Id= Order::select('client_id')
        ->where('order_no', $this->orderId)
        ->first();

        if (auth()->user()!=null) {
            $this->openId = $client_Id->client_id;
        } else {
            $this->openId = '';
        }


    }
    public function render()
    {

        if (auth()->user()!=null) {

            //fetch chat history with this one user;
            $this->chats(auth()->user()->id, "App\Models\User");
            if ($this->openId != null) {
                $this->getMesssage($this->openId);
                event( new MessageSentEvent());
            }

        } elseif(session()->get('LoggedClient')) {
            //list online admins' + previous people chat with;
            $this->chats(session()->get('LoggedClient'), "App\Models\Client");
            //fetch chat history;
            if ($this->openId != null) {
                $this->getMesssage($this->openId);
                event( new MessageSentEvent());
            }
        }

        return view('livewire.client.components.order-sum-with-chatbox');
    }

    public function createInvoice()
    {
        $this->modal= "livewire.admin.components.create-invoice-modal";
    }
    public function chats($userId, $Model)
    {

         $this->users = [];

        if(session()->get('LoggedClient') !=null){
           $this->users[0]  =  Client::all()->random(1);
           $onlineUsrs = User::
           where('online', 1)
        //    ->where('role', '!=', 'Admin')
           ->get();
           foreach ($onlineUsrs as $key => $value) {
               $value->setAttribute('model_type', 'App\Models\User');
               if ($this->compareObjs($value) == '') {
                    array_push($this->users, $value);
                }
           }

            $traces = Messaging::
            where(function($query) use($userId, $Model){
                $query->where('fromable_id', $userId)
                ->where('fromable_type',  $Model);
            })
            ->orwhere(function($query) use($userId, $Model){
                $query->where('toable_id', $userId)
                ->where('toable_type', $Model);
            })
            ->orderBy('id', 'desc')
            ->get()
            ->groupBy('fromable_type', 'toable_type');

            foreach($traces as $model){
                foreach ($model as $key => $value) {

                    if ($value['fromable_id'] == $userId && $value['fromable_type'] == $Model) {
                        // dump('yes');
                        $this->from_id = $value->toable_id;
                        $this->from_type = $value->toable_type;
                    }else{
                        $this->from_id = $value->fromable_id;
                        $this->from_type = $value->fromable_type;
                    }

                    if($this->from_type == 'App\Models\User'){

                        $getUser = User::where('id', $this->from_id)->first();
                        $getUser->setAttribute('model_type', 'App\Models\User');
                        if ($this->compareObjs($getUser) == '') {
                            // dd($getUser);
                            array_push($this->users, $getUser);
                        }

                   }elseif($this->from_type == 'App\Models\Client'){

                        $getUser = Client::where('id', $this->from_id)->first();
                        $getUser->setAttribute('model_type', 'App\Models\Client');
                        if ($this->compareObjs($getUser) !=null  ) {
                            dump('found array');
                        }else{
                            array_push($this->users, $getUser);
                        }
                   }

                }
            }
            unset($this->users[0]);
         }elseif(auth()->user() != null){

            $traces = Messaging::
            where(function($query) use($userId, $Model){
                $query->where('fromable_id', $userId)
                ->where('fromable_type',  $Model);
            })
            ->orwhere(function($query) use($userId, $Model){
                $query->where('toable_id', $userId)
                ->where('toable_type', $Model);
            })
            ->orderBy('id', 'desc')
            ->get()
            ->groupBy('fromable_type', 'toable_type');

            $this->users[0]  =   Client::all()->random(1);
            foreach($traces as $model){
                foreach ($model as $key => $value) {

                    if ($value['fromable_id'] == $userId && $value['fromable_type'] == $Model) {
                        // dump('yes');
                        $this->from_id = $value->toable_id;
                        $this->from_type = $value->toable_type;
                    }else{
                        $this->from_id = $value->fromable_id;
                        $this->from_type = $value->fromable_type;
                    }

                    if($this->from_type == 'App\Models\User'){

                        $getUser = User::where('id', $this->from_id)->first();
                        $getUser->setAttribute('model_type', 'App\Models\User');
                        if ($this->compareObjs($getUser) == '') {
                            array_push($this->users, $getUser);
                        }

                   }elseif($this->from_type == 'App\Models\Client'){

                        $getUser = Client::where('id', $this->from_id)->first();
                        $getUser->setAttribute('model_type', 'App\Models\Client');
                        if ($this->compareObjs($getUser) !=null  ) {
                            // dump('found array');
                        }else{
                            array_push($this->users, $getUser);
                        }
                   }

                }
            }

            unset($this->users[0]);
         }

        //  dd($this->users);

    }
    public function compareObjs($object)
    {
        $result = array_search($object, $this->users); // return index or false
        return $result;
    }
    public function openChat($user_id, $fromable_type)
    {
        // dd($user_id);
        $model = explode("Models",$fromable_type);
        $model = $model[0]."\\Models\\".$model[1];
        $this->openId = $user_id;
        $this->getMesssage($this->openId);
    }
    public function getMesssage($userId)
    {
        /*$model = explode("Models",$this->userTypeFro);
        $model = $model[0]."Models".$model[1];*/
        $model= '';

        if (auth()->user()!=null) {
            $this->messages = Messaging::
            where(function($query) use($userId, $model){
                $query->where('fromable_id', $userId)
                ->where('toable_id', auth()->user()->id)
                ->where('toable_type', "App\Models\User")
                ->where('fromable_type',  "App\Models\Client");
            })
            ->orwhere(function($query) use($userId, $model){
                $query->where('fromable_id', auth()->user()->id)
                ->where('toable_id', $userId)
                ->where('toable_type', "App\Models\Client")
                ->where('fromable_type',  "App\Models\User");
            })
            ->get();
            $this->userType = "App\Models\User";
            $this->sendMessageTo = "App\Models\Client";

        }
        if (session()->get('LoggedClient')!=null) {

            $this->openId = $userId;
            $this->messages = Messaging::
            where(function($query) use($userId,$model){
                $query->where('fromable_id', $userId)
                ->where('toable_id', session()->get('LoggedClient'))
                ->where('toable_type', "App\Models\Client")
                ->where('fromable_type',  "App\Models\User");
            })
            ->orwhere(function($query) use($userId,$model){
                $query->where('fromable_id', session()->get('LoggedClient'))
                ->where('toable_id', $userId)
                ->where('toable_type', "App\Models\User")
                ->where('fromable_type',  "App\Models\Client");
            })
            ->get();
            $this->userType = "App\Models\Client";
            $this->sendMessageTo = "App\Models\User";
        }
        // dd($this->messages);
    }
    public function getUsername()
    {
           if (auth()->user() != null) {
               if ($this->openId != null) {
                    $getClient = Client::where('id', $this->openId)->first();
                    return $getClient->username;
               }

           }elseif(session()->get('LoggedClient') != null){
               if ($this->openId !=null) {
                $getClient = User::where('id', $this->openId)->first();
                if ($getClient) {
                    return $getClient->name;
                }else{
                    return '';
                }

               }else{
                   return '';
               }

           }

    }
    public function getTimeForLastMsg($user_id, $model )
    {
        if (auth()->user()!=null) {
            $TimeForLastMsg = Messaging::
            where(function($query) use($user_id, $model){
                $query->where('fromable_id', $user_id)
                ->where('toable_id', auth()->user()->id)
                ->where('toable_type', "App\Models\User")
                ->where('fromable_type',  $model);
            })
            ->orwhere(function($query) use($user_id, $model){
                $query->where('fromable_id', auth()->user()->id)
                ->where('toable_id', $user_id)
                ->where('toable_type', $model)
                ->where('fromable_type',  "App\Models\User");
            })
            ->get()->last();
            if ($TimeForLastMsg) {
                return $TimeForLastMsg->created_at->diffForHumans();
            }else{
                return '';
            }
        }
        if (session()->get('LoggedClient')!=null) {

            $TimeForLastMsg = Messaging::
            where(function($query) use($user_id, $model){
                $query->where('fromable_id', $user_id)
                ->where('toable_id', session()->get('LoggedClient'))
                ->where('toable_type', "App\Models\Client")
                ->where('fromable_type',  $model);
            })
            ->orwhere(function($query) use($user_id, $model){
                $query->where('fromable_id', session()->get('LoggedClient'))
                ->where('toable_id', $user_id)
                ->where('toable_type', $model)
                ->where('fromable_type',  "App\Models\Client");
            })
            ->get()->last();
            if ($TimeForLastMsg) {
                return $TimeForLastMsg->created_at->diffForHumans();
            }else{
                return '';
            }
        }
        if (session()->get('AuthWriter')!=null) {

            $TimeForLastMsg = Messaging::
            where(function($query) use($user_id, $model){
                $query->where('fromable_id', $user_id)
                ->where('toable_id', session()->get('AuthWriter'))
                ->where('toable_type', "App\Models\Writer")
                ->where('fromable_type',  $model);
            })
            ->orwhere(function($query) use($user_id, $model){
                $query->where('fromable_id', session()->get('AuthWriter'))
                ->where('toable_id', $user_id)
                ->where('toable_type', $model)
                ->where('fromable_type',  "App\Models\Writer");
            })
            ->get()->last()->created_at->diffForHumans();
           return $TimeForLastMsg;
        }
    }
    public function getlastMessage($user_id, $model)
    {
        // dd($user_id. " " .$model);
        // $model = explode("Models",$this->userTypeFro);
        // $model = $model[0]."Models".$model[1];

        if (auth()->user()!=null) {
            $lastMessage = Messaging::
            where(function($query) use($user_id, $model){
                $query->where('fromable_id', $user_id)
                ->where('toable_id', auth()->user()->id)
                ->where('toable_type', "App\Models\User")
                ->where('fromable_type',  $model);
            })
            ->orwhere(function($query) use($user_id, $model){
                $query->where('fromable_id', auth()->user()->id)
                ->where('toable_id', $user_id)
                ->where('toable_type', $model)
                ->where('fromable_type',  "App\Models\User");
            })
            ->get()->last();
            if ($lastMessage) {
                return $lastMessage->message;
            }else{
                return '';
            }

        }
        if (session()->get('LoggedClient')!=null) {

            $lastMessage = Messaging::
            where(function($query) use($user_id, $model){
                $query->where('fromable_id', $user_id)
                ->where('toable_id', session()->get('LoggedClient'))
                ->where('toable_type', "App\Models\Client")
                ->where('fromable_type',  $model);
            })
            ->orwhere(function($query) use($user_id, $model){
                $query->where('fromable_id', session()->get('LoggedClient'))
                ->where('toable_id', $user_id)
                ->where('toable_type', $model)
                ->where('fromable_type',  "App\Models\Client");
            })
            ->get()->last();
            if ($lastMessage) {
                return $lastMessage->message;
            }else{
                return '';
            }
        }
        if (session()->get('AuthWriter')!=null) {

            $lastMessage = Messaging::
            where(function($query) use($user_id, $model){
                $query->where('fromable_id', $user_id)
                ->where('toable_id', session()->get('AuthWriter'))
                ->where('toable_type', "App\Models\Writer")
                ->where('fromable_type',  $model);
            })
            ->orwhere(function($query) use($user_id, $model){
                $query->where('fromable_id', session()->get('AuthWriter'))
                ->where('toable_id', $user_id)
                ->where('toable_type', $model)
                ->where('fromable_type',  "App\Models\Writer");
            })
            ->get()->last();
            if ($lastMessage) {
                return $lastMessage->message;
            }else{
                return '';
            }
        }
    }
    public function setOnread($id)
    {
        Messaging::where('id', $id)->update(['is_read' => 1]);
    }
    public function checkActivities()
    {
        $activities = Activity::
        where('to_id', session()->get('LoggedClient'))
        ->where('type', 'Admin')
        ->get();

    }
    public function sendInvoice(InvoiceService $invoiceService)
    {
        $validatedData = Validator::make(
            ['fee' => $this->fee],
            ['fee' => 'required'],
            ['required' => 'The :attribute field is required'],
        )->validate();

        $createInvoice =  $invoiceService->createInvoice(
            'Sent Invoice',
            auth()->user()->id,
            'App\Models\User',
            $this->orderDetails->client_id,
            'App\Models\Client',
            $this->fee,
            $this->orderDetails->order_no
        );

        if (!$createInvoice) {
            session()->flash('error-modal', 'Oops!, Something went wrong contact the manager');
        } else {
            session()->flash('success-modal', 'Invoice Sent Successfully');
            event( new InvoiceSentEvent());
            $this->reset('fee');
        }

    }
    public function sendMessage()
    {
        if (session()->get('LoggedClient')!=null) {

            $userFrom = Client::find(session()->get('LoggedClient'));
            $userTo = User::find($this->openId);

            $message = $userFrom->fromable()->create([
                'message' => $this->messageText,
                'fromable_id' => $userFrom->id,
                'toable_id' => $this->openId,
                'fromable_type' => $this->userType,
                'toable_type' => $this->sendMessageTo,
            ]);
            $this->reset('messageText');
            $this->messageText = '';
            // $this->emit('messageAdded');
            event( new MessageSentEvent());

        }
        if (auth()->user()!=null) {

            $userFrom = User::find(auth()->user()->id);
            $userTo = Client::find($this->openId);

            $message = $userFrom->fromable()->create([
                'message' => $this->messageText,
                'fromable_id' => $userFrom->id,
                'toable_id' => $this->openId,
                'fromable_type' => $this->userType,
                'toable_type' => $this->sendMessageTo,
            ]);
            $this->reset('messageText');
            $this->messageText = '';
            $this->emit('scroll-y');
            event( new MessageSentEvent());
        }

    }

    public function confrimInvoice()
    {
        // $this->emitUp('confrimInvoice');
        if (session()->get('LoggedClient')!=null) {
            $id = session()->get('LoggedClient');
            $this->from_id= $id;
            $this->to_id=1 ;
            $this->type= 'Client';
        }

        $this->orderId = session()->get('orderId');
        $order = Order::with('order')
                                    ->where('order_no', $this->orderId)
                                    ->first();
        OrderBilling::create([
            'order_id' => $order->id,
            'client_id' => $this->orderDetails->client_id,
            'amount' => $this->fee,
            'total_amount' => ($order->pages * $this->fee),
            'prepared_by' => $this->to_id,
        ]);

        Activity::where('id', $this->activity_id)
                ->update(['status' => 'responded']);

        Order::where('id',  $order->id)
                ->update(['status' => 'In progress']);
        session()->flash('Invoice-Confirmed', 'Invoice Confirmed Succesfully, Your Order Is In Progress.');
        return redirect()->route('dashboard');

    }
    public function rejectInvoice()
    {
        // $this->emitUp('rejectInvoice');
        Activity::where('id', $this->activity_id)
                ->update(['status' => 'rejected']);
        session()->flash('Invoice-Rejected', 'Invoice has been declined. Create a new one');
    }
    public function getDownload($value)
    {
        $this->emitUp('getDownload', $value);
    }
    public function edit()
    {
        $this->emitUp('edit');
    }


    //new from chat-order-summary

}
