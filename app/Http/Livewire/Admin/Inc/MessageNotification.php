<?php

namespace App\Http\Livewire\Admin\Inc;

use App\Models\Client;
use App\Models\Message;
use App\Models\Messaging;
use App\Models\Msg;
use App\Models\MsgTo;
use App\Models\User;
use App\Models\Writer;
use Livewire\Component;
use PhpParser\Node\Expr\List_;

class MessageNotification extends Component
{
    public $user_type;
    public $userTypeFro;
    public $userIdTo;
    public $user_id;

    public $listeners =[
        'messageAdded' => '$refresh'
    ];

    public function mount($user_id, $user_type)
    {
        $this->user_id = $user_id;
        $this->user_type = $user_type;
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


        return view('livewire.admin.inc.message-notification', [
            'count'=>$counts,
            'receivedMsgs'=>$receivedMsgs
        ]);

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
            return redirect()->route('client-chat');
        }elseif(session()->get('AuthWriter') != null){
            return redirect()->route('writer-chat');
        }

   }
}