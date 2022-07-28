<?php

namespace App\Http\Livewire\Client;

use App\Events\ClientHasRegisteredEvent;
use App\Models\Client;
use App\Services\Accounting\AccountService;
use App\Services\ClientService;
use App\Traits\SendAlerts;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ClientAuth extends Component
{

    use SendAlerts;

    public $full_name, $email, $password;
    public $centerView, $varview;

    protected $rules = [
        // 'full_name' => ['required'],
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];
    public function MoreUserRules()
    {
       return [
        'full_name' => ['required'],
        'email' => ['required', 'email', 'unique:clients'],
       ];
    }
    protected $messages = [
        'email.required' => 'The Email Address is required.',
        'email.email' => 'The Email Address format is not valid.',
        'full_name.required' => 'User Name is required.',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->centerView = 'default';
        $value='';
        if (session()->has('varView')) {
            $value = session()->get('varView');
            $this->varview = $value;
        }else{
            $this->varview = 'login';
        }
        if (session()->has('email')) {
            $email = session()->get('email');
            $this->email = $email;
        }
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
        DB::beginTransaction();
        try {
            $user = Client::where('email', $email)->firstOrFail();
            if (!Hash::check($password, $user->password)) {
                session()->flash('message', 'Authentication Failed');
                return false;
            }elseif($user->status == 'Inactive'){
                session()->flash('message', 'Authentication Failed. Verify your account');
                return false;
            }
            else{
                session()->put('LoggedClient', $user->id);
                Client::where('id', session()->get('LoggedClient'))->update(['online'=>1]);
            }
            DB::commit();
            return true;
        } catch (Exception $th) {
            DB::rollback();
            session()->flash('message', 'No such email with us');
            return false;
        }

    }
    public function signup(AccountService $accountService, ClientService $clientService)
    {
        $this->validate();
        // $this->validate($this->MoreUserRules());

        $email = Client::where('email', $this->email)->first();
        if ($email) {
            session()->flash('message', 'Email Already In Use');
            return;
        }
        //create user
        DB::beginTransaction();
        try {
            $hash_pass =Hash::make($this->password);
            $client = Client::Create([
                'email'=>$this->email,
                'username'=>$this->full_name,
                'password'=>$hash_pass,
            ]);
            if ($client) {

                if ($accountService->createAccount('', $client->username, $client->id, $clientService->getClientModelPath(), 0, '')) {
                    $this->storeInSession($client->id);
                    session()->put('LoggedClient', $client->id);
                    Client::where('id', session()->get('LoggedClient'))->update(['online'=>1]);
                } else {
                    DB::rollback();
                    return session()->flash('message',  'Oops! We were not able to initialize your charts of account. Please try again later');
                }
            } else {
                return session()->flash('message',  'Oops! We were not able to create your account. Please try again later');
            }

            // event( new ClientHasRegisteredEvent($client));

            //Mail::to($this->email)->send(new VerifyAccountMail($this->email));
            // $this->centerView = '';
            // $this->centerView = 'resend-link';

            DB::commit();
            return redirect('client/dashboard');
        } catch (\Exception $e) {
            DB::rollback();
            // return session()->flash('message', $e->getMessage());
            return session()->flash('message', (config('app.debug')) ? $e->getMessage() : 'Something went wrong, try again later');
        }


    }

    public function storeInSession($client_id)
    {
        Session::forget('NewClient');
        $this->storeData('NewClient', 'client_id', $client_id);

    }

    public function createAccount()
    {
        $this->resetView();
        $this->varview = 'create-account';
    }

    public function login()
    {
        $this->resetView();
        $this->varview = 'login';
    }

    public function resetView()
    {
        $this->varview = '';
    }

}
