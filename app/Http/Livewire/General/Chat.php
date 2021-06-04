<?php

namespace App\Http\Livewire\General;

use App\Models\Client;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Chat extends Component
{
    public $userId, $client, $openId;
    public $from_id,$to_id,$type, $messageText;
    public $unreadStatus = false;
    public $users, $messages= [];
    public  $unread = [];
    public function render()
    {
        // dd($this->messages);
        if (auth()->user()!=null) {
            $this->users = DB::select("select clients.id, clients.username, clients.email, count(is_read) as unread
            from clients LEFT  JOIN  messages ON clients.id = messages.from_id  and messages.to_id = " . auth()->user()->id . "
            where messages.type = 'Client' group by clients.id, clients.username, clients.email");

            if ($this->users == null) {
                $this->users = Client::all();
            }
        }
        if (session()->get('LoggedClient')!=null) {
            // $this->users = User::with('sessions')->get();
            $id = session()->get('LoggedClient');
            $this->users = DB::select("select users.id, users.name, users.email, users.role, count(is_read) as unread
            from users LEFT  JOIN  messages ON users.id = messages.from_id  and messages.to_id = " . $id[0] . "
            where messages.type = 'Admin' group by users.id, users.name, users.email, users.role");

            if ($this->users == null) {
                $this->users = User::where('is_admin', 1)->get();
            }

        }
        if ($this->openId !=null) {
            $this->getMesssage($this->openId);
        }
        return view('livewire.general.chat')->layout('layouts.client');
    }
    public function getMesssage($userId)
    {
        $this->openId=$userId;
        if (auth()->user()!=null) {
            $this->to_id = $userId;
            $my_id = auth()->user()->id;
            Message::where(['from_id' => $userId, 'to_id' => $my_id, 'type'=>'Client'])
            // ->whereNotIn('type', 'Client')
            ->update(['is_read' => 1]);
            // $user_id = 'Client';
            $this->client = session()->get('LoggedClient');
            // Message::where(['from_id' => $user_id, 'to_id' => $my_id])->update(['is_read' => 1]);
           // Get all message from selected user
            $this->messages = Message::where(function ($query) use ($userId, $my_id) {
                $query->where('from_id', $userId)->where('to_id', $my_id);
            })->oRwhere(function ($query) use ($userId, $my_id) {
                $query->where('from_id', $my_id)->where('to_id', $userId);
            })->get();
            // ->latest()
            // ->take(10)
            // ->get()
        }
        if (session()->get('LoggedClient')!=null) {
            $this->to_id = $userId;
            $my_id = session()->get('LoggedClient');
            Message::where(['from_id' => $userId, 'to_id' => $my_id[0], 'type'=>'Admin'])
            // ->whereNotIn('type', 'Client')
            ->update(['is_read' => 1]);
            // $user_id = 'Client';
            $this->client = session()->get('LoggedClient');
            // Message::where(['from_id' => $user_id, 'to_id' => $my_id])->update(['is_read' => 1]);
           // Get all message from selected user
            $this->messages = Message::where(function ($query) use ($userId, $my_id) {
                $query->where('from_id', $userId)->where('to_id', $my_id);
            })->oRwhere(function ($query) use ($userId, $my_id) {
                $query->where('from_id', $my_id)->where('to_id', $userId);
            })->get();
            // ->latest()
            // ->take(10)
            // ->get()
        }


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
            $id = session()->get('LoggedClient');
            $this->from_id= $id[0];
            $this->type= 'Client';
        }
        if (auth()->user()!=null) {
            $this->from_id=auth()->user()->id;
            $this->type= 'Admin';
        }
        Message::create([
            'message' => $this->messageText,
            'from_id' => $this->from_id,
            'to_id' => $this->to_id,
            'type' => $this->type,
            'is_read' => 0,
        ]);

        $this->reset('messageText');
    }
}
