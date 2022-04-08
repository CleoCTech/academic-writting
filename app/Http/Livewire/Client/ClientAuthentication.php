<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Exception;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ClientAuthentication extends Component
{
    public $email ='';
    public $password ='';

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.client.client-authentication')->layout('layouts.client');
    }
    public function auth()
    {
        $this->validate();
        if (!$this->AutheniticateExistingUser($this->email, $this->password)) {
            return;
        }
        dd('her1');
        return redirect('client/dashboard');
    }
    public function AutheniticateExistingUser($email, $password)
    {
        try {
            $user = Client::where('email', $email)->firstOrFail();
            dd('her');
            if ($user->status == 'Inactive'){
                dd('false');
                return false;
            }
            if (!Hash::check($password, $user->password)) {
                session()->flash('message', 'Authentication Failed');
                return false;
            }elseif($user->status == 'Inactive'){
                session()->flash('message', 'Authentication Failed. Verify your account');
                return false;
            }
            else{
                session()->put('LoggedClient', $user->id);
                return true;
            }
        } catch (Exception $th) {
            session()->flash('message', 'No such email with us');
            return false;
        }

    }
}