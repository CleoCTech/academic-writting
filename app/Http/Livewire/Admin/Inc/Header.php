<?php

namespace App\Http\Livewire\Admin\Inc;

use App\Models\Client;
use App\Models\Writer;
use Livewire\Component;

class Header extends Component
{
    public $client=[];

    public function mount()
    {
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
        // dd($client->username);
        return view('livewire.admin.inc.header');
    }
}
