<?php

namespace App\Http\Livewire\Writer\Order;

use App\Events\MessageSentEvent;
use App\Events\WriterCommitsOrderFilesEvent;
use App\Models\Client;
use App\Models\ClientFile;
use App\Models\Order;
use App\Models\User;
use App\Models\Messaging;
use App\Models\Writer;
use App\Models\WriterFile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class OrderDetails extends Component
{
    public $orderId;
    public $orderFiles =[];
    public $writerFiles =[];
    public $orderDetails =[];
    public $option1, $option2 =false;
    public $messagesTab, $orderSubmitTab =false;
    public $supports = [];
    public $messages = [];
    public $clientmessages = [];
    public $userType;
    public $sendMessageTo;
    public $toableClient;
    public $from_id;
    public $from_type;
    public $toable_id;
    public $toableclient_id;
    public $messageText;
    public $cleintmessageText;

    protected $listeners = [
        'messageAdded' => '$refresh'
    ];

    public function mount()
    {
        $this->supports = '';
        $this->orderId = session()->get('orderId');
        $this->orderDetails = Order::where('id', $this->orderId)->first();
        $this->orderFiles = ClientFile::with('order')
                                ->where('order_id', $this->orderId)
                                ->get();
        $this->writerFiles = WriterFile::where('writer_id', session()->get('AuthWriter'))
                                        ->where('order_id', $this->orderId)
                                        ->get();
        $this->option1 = true;
        $this->messagesTab = true;
        $this->getsupportUsers();
        // $this->writerId = session()->get('AuthWriter');
    }
    public function render()
    {
        if ($this->toable_id != null && $this->sendMessageTo != null) {
            $model=  str_replace('\\','',$this->sendMessageTo);
            $this->getMesssage($this->toable_id , $model);
        }
        if ($this->option2) {
            $this->getclientMesssage($this->orderDetails['client_id']);
        }
        return view('livewire.writer.order.order-details');
    }
    public function sendMessage()
    {
        if ($this->option2) {
            $userFrom = Writer::find(session()->get('AuthWriter'));

            $message = $userFrom->fromable()->create([
                'message' => $this->cleintmessageText,
                'fromable_id' => $userFrom->id,
                'toable_id' => $this->toableclient_id,
                'fromable_type' => $this->userType,
                'toable_type' => $this->toableClient,
            ]);

            $this->reset('cleintmessageText');
            $this->cleintmessageText = '';
            $this->emit('messageAdded');
            event( new MessageSentEvent());

        }elseif($this->option1){
            if (session()->get('AuthWriter')!=null) {

                $userFrom = Writer::find(session()->get('AuthWriter'));

                $message = $userFrom->fromable()->create([
                    'message' => $this->messageText,
                    'fromable_id' => $userFrom->id,
                    'toable_id' => $this->toable_id,
                    'fromable_type' => $this->userType,
                    'toable_type' => $this->sendMessageTo,
                ]);

                $this->reset('messageText');
                $this->messageText = '';
                $this->emit('messageAdded');
                event( new MessageSentEvent());

            }
        }
    }
    public function setOnread($id)
    {
        Messaging::where('id', $id)->update(['is_read' => 1]);
    }
    public function getclientMesssage($userId)
    {
        $model = "App\Models\Client";

        $this->toableclient_id = $userId;
        if (session()->get('AuthWriter')!=null) {

            $this->clientmessages = Messaging::
            where(function($query) use($userId, $model){
                $query->where('fromable_id', $userId)
                ->where('toable_id', session()->get('AuthWriter'))
                ->where('toable_type', "App\Models\Writer")
                ->where('fromable_type',  $model);
            })
            ->orwhere(function($query) use($userId, $model){
                $query->where('fromable_id', session()->get('AuthWriter'))
                ->where('toable_id', $userId)
                ->where('toable_type', $model)
                ->where('fromable_type',  "App\Models\Writer");
            })
            ->get();
            $this->userType = "App\Models\Writer";
            $this->toableClient = $model;
        }
        // dd($this->clientmessages);
    }
    public function getMesssage($userId, $model)
    {
        // dd('user Id:' .$userId. 'Model:' .$model);

        $model = explode("Models",$model);
        $model = $model[0]."\\Models\\".$model[1];

        // dd('user Id:' .$userId. 'Model:' .$model);
        $this->toable_id = $userId;
        if (session()->get('AuthWriter')!=null) {

            $this->messages = Messaging::
            where(function($query) use($userId, $model){
                $query->where('fromable_id', $userId)
                ->where('toable_id', session()->get('AuthWriter'))
                ->where('toable_type', "App\Models\Writer")
                ->where('fromable_type',  $model);
            })
            ->orwhere(function($query) use($userId, $model){
                $query->where('fromable_id', session()->get('AuthWriter'))
                ->where('toable_id', $userId)
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
            ->get()->last();
            if ($TimeForLastMsg) {
                return $TimeForLastMsg->created_at->diffForHumans();
            }else{
                return '';
            }
        }
    }
    public function getlastMessage($user_id, $model)
    {
        // dd($user_id. " " .$model);
        // $model = explode("Models",$this->userTypeFro);
        // $model = $model[0]."Models".$model[1];
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
    public function getsupportUsers()
    {
        $this->supports = [];
        $this->supports[0]  =   Client::all()->random(1);

        $onlineUsrs = User::
        where('online', 1)
        ->where('role','!=', 'Admin')
        ->get();
        foreach ($onlineUsrs as $key => $value) {
            $value->setAttribute('model_type', 'App\Models\User');
            array_push($this->supports, $value);
        }
        $user_id = session()->get('AuthWriter');
        $model = "App\Models\Writer";

        $traces = Messaging::
        where(function($query) use($user_id, $model){
            $query->where('fromable_id', $user_id)
            ->where('fromable_type', '!=', "App\Models\Client")
            ->where('fromable_type',  $model);
        })
        ->orwhere(function($query) use($user_id, $model){
            $query->where('toable_id', $user_id)
            ->where('toable_type', $model);
        })
        ->orderBy('id', 'desc')
        ->get()
        ->groupBy('fromable_type', 'toable_type');

        foreach($traces as $model){
            foreach ($model as $key => $value) {

                if ($value['fromable_id'] == $user_id && $value['fromable_type'] == $model) {
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
                        array_push($this->supports, $getUser);
                    }
               }

            }
        }
        unset($this->supports[0]);
        // dd($this->supports);
    }
    public function optionTwo()
    {
        $this->option1 = false;
        $this->option2 = true;
        $this->getclientMesssage($this->orderDetails['client_id']);
    }
    public function optionOne()
    {
        $this->option2 = false;
        $this->option1 = true;
    }
    public function messagesTab()
    {
        $this->orderSubmitTab = false;
        $this->messagesTab = true;
    }
    public function orderSubmitTab()
    {
        $this->messagesTab = false;
        $this->orderSubmitTab = true;
    }
    public function calDeadline($toDate, $toTime)
    {
        $current_date = now();
        $date = Carbon::parse($toDate)->addHours($toTime);
        $diff = $current_date->shortAbsoluteDiffForHumans($date);

        return $diff;
    }
    public function getDownload($value)
    {

        $file= 'storage/writer_files/' .$value;

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            session()->flash('message', 'File Does Not Exist.');
            $this->alert('error', 'File Does Not Exist', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
        }

    }
    public function deleteFile($value)
    {

        $file= 'storage/writer_files/' .$value;


        if (file_exists($file)) {

            $file = WriterFile::where('folder', $value)->first();
            if ($file) {
                Storage::move('writer_files/' .$value, 'writer_trash/' .$value);
                // rmdir(storage_path('app/public/writer_files/' .$value ));
                $file->delete();
            }
            // return response()->download($file);
            $this->alert('success', 'File Deleted Successfuly', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
           ]);
        } else {
             $this->alert('error', 'File Does Not Exist', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
        }

    }
    public function sendFiles()
    {
        $writerId = session()->get('AuthWriter');
        event( new WriterCommitsOrderFilesEvent($this->orderId, $writerId));
    }
    public function compareObjs($object)
    {
        $result = array_search($object, $this->supports); // return index or false
        return $result;
    }
    public function default()
   {
       $this->emit('update_varView', 'my-orders');
   }
}