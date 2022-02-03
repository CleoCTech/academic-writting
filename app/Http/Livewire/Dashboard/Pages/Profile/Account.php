<?php

namespace App\Http\Livewire\Dashboard\Pages\Profile;

use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Account extends Component
{
    public $email, $username;

    protected $listeners = [
        'refresh'=> '$refresh',
    ];
    protected $rules = [
        'email' => 'required|email',
        'username' => 'required',
    ];
    public function render()
    {
        if(session()->get('LoggedClient') !=null) {
            $client = Client::where('id', session()->get('LoggedClient'))->first();
            $this->username = $client->username;
            $this->email = $client->email;
        }
        return view('livewire.dashboard.pages.profile.account');
    }
    public function store()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            Client::where('id', session()->get('LoggedClient'))
            ->update([
                'email'=> $this->email,
                'username'=> $this->username
            ]);
            //verify email change event here;
            DB::commit();
            $this->emitSelf('refresh');
            session()->flash('status', 'Updated successful!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}