<?php

namespace App\Http\Livewire\Admin\Inc;

use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Writer;
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
        return view('livewire.admin.inc.aside');
    }
    public function jobs()
    {
        // dd("jobs");
        $this->emitUp('update_varView', 'jobs');
    }
    public function invoice()
    {
        $this->emitUp('update_varView', 'invoice');
    }

}
