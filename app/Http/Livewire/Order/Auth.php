<?php

namespace App\Http\Livewire\Order;

use App\Events\ClientHasRegisteredEvent;
use App\Events\ClientHasLoggedInEvent;
use App\Models\Client;
use App\Services\Accounting\AccountService;
use App\Services\ClientService;
use App\Traits\SendAlerts;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Session;


class Auth extends Component
{
    use SendAlerts;

    public $option1=false, $option2=false;
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
        if (session()->has('Initial-Mail')) {
            foreach (session()->get('Initial-Mail') as $key => $value)
            {
                if($value['type']=='email'){
                    $this->email = $value['message'];
                    $this->auth_email = $value['message'];
                }
            }
        }
        if (session()->get('Email-Check')!=null) {
            $this->resetProps();
            $this->option2();
        }else{
            $this->resetProps();
            $this->option1();
        }

    }
    public function render()
    {
        return view('livewire.order.auth');
    }
    public function resetProps()
    {
        $this->option1=false;
        $this->option2=false;
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
            $user = Client::where('email', $email)->firstOrFail();
            if (!Hash::check($password, $user->password)) {
                session()->flash('message', 'Authentication Failed');
                return false;
            }else{
                return true;
            }
        } catch (Exception $th) {
            session()->flash('message', 'No such email with us');
            return false;
        }

    }
    public function store(AccountService $accountService, ClientService $clientService)
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

        $accountService->createAccount('', $client->username, $client->id, $clientService->getClientModelPath(), 0, '');
        $this->storeInSession($client->id);
        session()->put('LoggedClient', $client->id);
        event( new ClientHasRegisteredEvent($client));
        $this->emitUp('update_varView', 'success');

      }elseif ($this->option2) {

        $this->validate($this->ExistingUserRules());
        if (!$this->AutheniticateExistingUser($this->auth_email, $this->auth_pass)) {
            return;
        }
        // $this->storeData('AuthClient', 'email', $this->email);
        // $this->storeData('AuthClient', 'password', $this->password);
        $this->emitUp('update_varView', 'success');
        event( new ClientHasLoggedInEvent($this->auth_email, $this->auth_pass));

      }

    }
    public function previousStep()
    {
        $this->emitUp('update_varView', '');
    }
    public function storeInSession($client_id)
    {
        Session::forget('NewClient');
        $this->storeData('NewClient', 'client_id', $client_id);

    }

}
