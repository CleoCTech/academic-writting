<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Exception;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ClientAuth extends Component
{

    public $email, $password='';

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
        return view('livewire.client.client-auth')->layout('layouts.plain');
    }
    public function auth()
    {
        $this->validate();
        if (!$this->AutheniticateExistingUser($this->email, $this->password)) {
            return;
        }
        return redirect('client/dashboard');
    }
    public function AutheniticateExistingUser($email, $password)
    {
        try {
            $user = Client::where('email', $email)->firstOrFail();
            if (!Hash::check($password, $user->password)) {
                session()->flash('message', 'Authentication Failed');
                return false;
            }else{
                session()->put('LoggedClient', $user->id);
                return true;
            }
        } catch (Exception $th) {
            session()->flash('message', 'No such email with us');
            return false;
        }

    }
}