<?php

namespace App\Http\Livewire\Dashboard\Pages;

use App\Events\MessageSentEvent;
use App\Models\Client;
use App\Models\Message;
use App\Models\Messaging;
use App\Models\User;
use App\Models\Writer;
use Livewire\Component;

class Chat extends Component
{
    public $userId, $client, $openId;
    public $to_id,$type;
    public $unreadStatus = false;
    public $users =[];
    public $messages= [];
    public  $unread = [];
    public $userType;
    public $userTypeFro;
    public $messageText;
    public $user_id;
    public $model;
    public $from_id;
    public $from_type;
    public $sendMessageTo;

    protected $listeners = [
        'messageAdded' => '$refresh'
    ];

    public function mount()
    {
        $this->openId = session()->get('userIdN');
        $this->userTypeFro = session()->get('userTypeFro');

        if ($this->model == '' && $this->user_id == '') {
            if (auth()->user()!=null) {
                $this->model = 'App\Models\User';
                $this->user_id =auth()->user()->id;
            }elseif(session()->get('LoggedClient')!=null){
                $this->model = 'App\Models\Client';
                $this->user_id =session()->get('LoggedClient');
            }elseif(session()->get('AuthWriter')!=null){
                $this->model = 'App\Models\Writer';
                $this->user_id =session()->get('AuthWriter');
            }
        }
    }

    public function render()
    {
        if ($this->openId !=null) {
            $this->getMesssage($this->openId, $this->userTypeFro);
            $this->chatHistory($this->user_id, $this->model);
            event( new MessageSentEvent());

        }else{
            $this->chatHistory($this->user_id, $this->model);
        }
        return view('livewire.dashboard.pages.chat')->layout('layouts.moderndashboard');
    }
    public function openChat($user_id, $fromable_type)
    {
        $model = explode("Models",$fromable_type);
        $model = $model[0]."\\Models\\".$model[1];
        $this->openId = $user_id;
        $this->userTypeFro = $model;
        $this->getMesssage($this->openId, $this->userTypeFro);
    }
    public function setOnread($id)
    {   
        Messaging::where('id', $id)->update(['is_read' => 1]);
    }
    public function getMesssage($userId, $model)
    {
        $model = explode("Models",$this->userTypeFro);
        $model = $model[0]."Models".$model[1];

        if (auth()->user()!=null) {
            $this->messages = Messaging::
            where(function($query) use($model){
                $query->where('fromable_id', $this->openId)
                ->where('toable_id', auth()->user()->id)
                ->where('toable_type', "App\Models\User")
                ->where('fromable_type',  $model);
            })
            ->orwhere(function($query) use($model){
                $query->where('fromable_id', auth()->user()->id)
                ->where('toable_id', $this->openId)
                ->where('toable_type', $model)
                ->where('fromable_type',  "App\Models\User");
            })
            ->get();
            $this->userType = "App\Models\User";
            $this->sendMessageTo = $model;

        }
        if (session()->get('LoggedClient')!=null) {

            $this->messages = Messaging::
            where(function($query) use($model){
                $query->where('fromable_id', $this->openId)
                ->where('toable_id', session()->get('LoggedClient'))
                ->where('toable_type', "App\Models\Client")
                ->where('fromable_type',  $model);
            })
            ->orwhere(function($query) use($model){
                $query->where('fromable_id', session()->get('LoggedClient'))
                ->where('toable_id', $this->openId)
                ->where('toable_type', $model)
                ->where('fromable_type',  "App\Models\Client");
            })
            ->get();
            $this->userType = "App\Models\Client";
            $this->sendMessageTo = $model;
        }
        if (session()->get('AuthWriter')!=null) {

            $this->messages = Messaging::
            where(function($query) use($model){
                $query->where('fromable_id', $this->openId)
                ->where('toable_id', session()->get('AuthWriter'))
                ->where('toable_type', "App\Models\Writer")
                ->where('fromable_type',  $model);
            })
            ->orwhere(function($query) use($model){
                $query->where('fromable_id', session()->get('AuthWriter'))
                ->where('toable_id', $this->openId)
                ->where('toable_type', $model)
                ->where('fromable_type',  "App\Models\Writer");
            })
            ->get();
            $this->userType = "App\Models\Writer";
            $this->sendMessageTo = $model;
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
            ->get()->last()->created_at->diffForHumans();
            return $TimeForLastMsg;

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
            ->get()->last()->created_at->diffForHumans();
           return $TimeForLastMsg;
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
            ->get()->last()->message;
            return $lastMessage;

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
            ->get()->last()->message;
           return $lastMessage;
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
            ->get()->last()->message;
           return $lastMessage;
        }
    }
    public function getUsername()
    {
           if ($this->userTypeFro == 'App\Models\Client') {
                $getClient = Client::where('id', $this->openId)->first();
                return $getClient->username;
           }elseif($this->userTypeFro == 'App\Models\User'){
                $getClient = User::where('id', $this->openId)->first();
                return $getClient->name;
           }elseif ($this->userTypeFro == 'App\Models\Writer') {
                $getClient = Writer::where('id', $this->openId)->first();
                return $getClient->firstname. " " .$getClient->lastname;
           }

    }
    public function getOwnerName()
    {
       if (auth()->user() != null) {
        if ($this->openId !=null) {
            $getClient = User::where('id', auth()->user()->id)->first();
            if ($getClient) {
                return $getClient->name;
            }else{
                return '';
            }

           }else{
               return '';
           }
       } elseif (session()->get('LoggedClient') != null) {
            $getClient = Client::where('id', session()->get('LoggedClient'))->first();
            return $getClient->username;
       }
    }
    public function chatHistory($user_id, $model)
    {
        // dd($model);
        $this->users = [];

        // $traces = Messaging::where(['toable_id' => $user_id,'toable_type' => $model])
        //                     ->orwhere(['fromable_id' => $user_id,'fromable_type' => $model])
        //                     ->orderBy('id', 'desc')
        //                     ->get()
        //                     ->groupBy('fromable_type', 'toable_type');
        //                     dd($traces);

        $traces = Messaging::
        where(function($query) use($user_id, $model){
            $query->where('fromable_id', $user_id)
            ->where('fromable_type',  $model);
        })
        ->orwhere(function($query) use($user_id, $model){
            $query->where('toable_id', $user_id)
            ->where('toable_type', $model);
        })
        ->orderBy('id', 'desc')
        ->get()
        ->groupBy('fromable_type', 'toable_type');

        $this->users[0]  =   Client::all()->random(1);
        foreach($traces as $model){
            foreach ($model as $key => $value) {

                if ($value['fromable_id'] == $this->user_id && $value['fromable_type'] == $this->model) {
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

               }elseif ($this->from_type == 'App\Models\Writer') {

                    $getUser = Writer::where('id', $this->from_id)->first();
                    $getUser->setAttribute('model_type', 'App\Models\Writer');
                    if ($this->compareObjs($getUser) == '') {
                        // dump('empty array1');
                        array_push($this->users, $getUser);
                    }else{
                        // dump('found array1');
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
        // dd('done');
        unset($this->users[0]);
        // dd($this->users);
        // dd('34');
    }
    public function compareObjs($object)
    {
        $result = array_search($object, $this->users); // return index or false
        return $result;
    }
    public function countUnreadMessages($id){
        if (session()->get('LoggedClient')!=null) {
            $my_id = session()->get('LoggedClient');
            $this->unread = Message::where(['from_id' => $id, 'to_id' => $my_id[0], 'type'=>'Admin', 'is_read'=>0])->count();
            return $this->unread;
        }
        if (auth()->user()!=null) {
            $my_id = auth()->user()->id;
            $this->unread = Message::where(['from_id' => $id, 'to_id' => $my_id, 'type'=>'Client', 'is_read'=>0])->count();
            return $this->unread;
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
        if (session()->get('AuthWriter')!=null) {

            $userFrom = Writer::find(session()->get('AuthWriter'));

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


    }
}