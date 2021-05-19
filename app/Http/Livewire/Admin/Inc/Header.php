<?php

namespace App\Http\Livewire\Admin\Inc;

use App\Models\Client;
use Livewire\Component;

class Header extends Component
{
    public $client=[];
    public function mount()
    {
        $this->client = Client::where('id', session()->get('LoggedClient'))->first();
    }
    public function render()
    {

        // dd($client->username);
        return view('livewire.admin.inc.header');
    }
}