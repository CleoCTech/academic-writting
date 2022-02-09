<?php

namespace App\Http\Livewire\Admin\Inc;

use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Order;
use App\Models\Writer;
use App\Models\WriterOrder;
use Livewire\Component;

class Aside extends Component
{

    public $account_status=false;
    public $AuthWriter = '';
    public $AuthClient = '';
    public $client = '';
    public $showAdminUtils = false;

    public function mount()
    {
        if (session()->get('AuthWriter') !=null) {
            $this->client = Writer::where('id', session()->get('AuthWriter'))->first();
            if ($this->client->status != "Pending") {
                $this->account_status = true;
            }
        } elseif(session()->get('LoggedClient') !=null) {
            $this->client = Client::where('id', session()->get('LoggedClient'))->first();
        }

        // if (Auth::check()) {
        //     $this->showAdminUtils = true;
        // }

    }
    public function render()
    {
        if (session()->get('AuthWriter') !=null) {
            $activeOrders = WriterOrder::whereHas('writer')
            ->where('status', 'Active')
            ->orWhere('status', 'Revision')
            ->get()->count();
        }else{
            $activeOrders = "";
        }
        return view('livewire.admin.inc.aside', [
            'activeOrders' => $activeOrders,
        ]);
    }
    public function jobs()
    {
        $this->emitUp('update_varView', 'jobs');
    }
    public function invoice()
    {
        $this->emitUp('update_varView', 'invoice');
    }

}