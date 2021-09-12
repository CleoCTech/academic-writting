<?php

namespace App\Http\Livewire\Admin\Inc;

use App\Models\Client;
use App\Models\Message;
use App\Models\Msg;
use App\Models\MsgTo;
use Livewire\Component;

class MessageNotification extends Component
{
    public $user_type;
    public $user_id;

    public function mount($user_id, $user_type)
    {
        $this->user_id = $user_id;
        $this->user_type = $user_type;
    }
    public function render()
    {
        // $count =MsgTo::whereMo ;

        $receivedMsgs = MsgTo::whereHasMorph('toable', [$this->user_type])
                                ->whereHas('message', function($query){
                                    return $query->where('is_read', 0);
                                })
                               ->get()->count();

        return view('livewire.admin.inc.message-notification', [
            'count'=>$receivedMsgs

        ]);

   }
}