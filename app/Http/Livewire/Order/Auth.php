<?php

namespace App\Http\Livewire\Order;

use App\Events\ClientHasRegisteredEvent;
use App\Models\Client;
use App\Traits\SendAlerts;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Session;


class Auth extends Component
{
    use SendAlerts;

    public $option1=true, $option2=false;
    public $email,$full_name, $password, $auth_pass,  $confirm_password, $auth_email='';

    protected $rules = [
        'full_name' => ['required'],
        'confirm_password' => ['required'],
        'password' => ['required'],
        'email' => ['required', 'email']
    ];

    protected $messages = [
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
        'auth_email.required' => 'The Email Address cannot be empty.',
        'auth_email.email' => 'The Email Address format is not valid.',
        'auth_pass.required' => 'The Password Field Cannot Be Empty',
    ];
    public function ExistingUserRules(){
        return [
            'auth_email' => ['required', 'email'],
            'auth_pass' => ['required'],
        ];
    }

    public function mount()
    {
        $this->option1;
    }
    public function render()
    {
        return view('livewire.order.auth');
    }
    public function resetProps()
    {
        $this->option1='';
        $this->option2='';
    }
    public function option1()
    {
        $this->resetProps();
        $this->option1=true;
    }
    public function option2()
    {
        $this->resetProps();
        $this->option2=true;
    }

    public function AutheniticateExistingUser($email, $password)
    {
        try {
            $user = Client::with('client', '=', $email)->firstOrFail();
            if (!Hash::check($password, $user->password)) {
                session()->flash('message', 'Authentication Failed');
                return true;
            }
        } catch (Exception $th) {
            session()->flash('message', 'No such email with us');
            return false;
        }

    }
    public function store()
    {
      if ($this->option1) {

        $this->validate();
        if (!($this->password == $this->confirm_password) ) {
            session()->flash('message', 'Password did not match');
            return;
        }

        $email = Client::where('email', $this->email)->first();
        if ($email) {
            session()->flash('message', 'Email Already In Use');
            return;
        }
        //create user
        $hash_pass =Hash::make($this->password);
        $client = Client::Create([
            'email'=>$this->email,
            'username'=>$this->full_name,
            'password'=>$hash_pass,
        ]);
        $this->storeInSession($client->id);
        event( new ClientHasRegisteredEvent($client));
        $this->emitUp('update_varView', 'success');

      }elseif ($this->option2) {

        $this->validate($this->ExistingUserRules());
        if (!$this->AutheniticateExistingUser($this->auth_email, $this->auth_pass)) {
            return;
        }
        $this->emitUp('update_varView', 'success');

      }

    }
    public function storeInSession($client_id)
    {
        Session::forget('NewClient');
        $this->storeData('NewClient', 'client_id', $client_id);

    }

}