<?php

namespace App\Http\Livewire\Writer;

use App\Mail\VerifyAccountMail;
use App\Models\Writer;
use Exception;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class WriterAuthentication extends Component
{
    public $varview, $email, $password;
    public $centerView;

    protected $listeners = ['centerView'=> 'updateVarView']; // not in use for now

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    public function MoreUserRules()
    {
       return [
        'email' => ['required', 'email', 'unique:writers'],
       ];
    }
    //this fnx not in use for now
    public function updateVarView($value)
    {
        $this->centerView = $value;
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
    public function createAccount(){
        $this->resetView();
        $this->varview = 'create-account';
    }
    public function login(){
        $this->resetView();
        $this->varview = 'login';
    }
    public function resetView()
    {
        $this->varview = '';
    }
    public function render()
    {
        return view('livewire.writer.writer-authentication')->layout('layouts.client');
    }
    public function auth()
    {
        $this->validate();
        if (!$this->AutheniticateExistingUser($this->email, $this->password)) {
            return;
        }
        if (!$this->checkAccountStatus($this->email)) {
            return redirect('writer/settings');
        }else{
            return redirect('writer/dashboard');
        }

    }
    public function signup()
    {
        $this->validate($this->MoreUserRules());

        $email = Writer::where('email', $this->email)->first();
        if ($email) {
            session()->flash('message', 'Email Already In Use');
            return;
        }
        //create user
        $hash_pass =Hash::make($this->password);
        $writer = Writer::Create([
            'email'=>$this->email,
            'password'=>$hash_pass,
        ]);

        if ($writer) {
        }else{
            return  session()->flash('fail', 'Something went wrong, try again later');
        }
        Mail::to($this->email)->send(new VerifyAccountMail($this->email));
        $this->centerView = '';
        $this->centerView = 'resend-link';
    }
    public function checkAccountStatus($email)
    {
       try {
            $writer = Writer::where('email', $email)->firstOrFail();
            if ($writer->status == 'Pending') {
                return false;
            }else{
                return true;
            }
       } catch (Exception $e) {
         session()->flash('message', $e->getMessage());
       }
    }
    public function AutheniticateExistingUser($email, $password)
    {
        try {
            $writer = Writer::where('email', $email)->firstOrFail();
            if (!Hash::check($password, $writer->password)) {
                session()->flash('message', 'Authentication Failed');
                return false;
            }else{
                session()->push('AuthWriter', $writer->id);
                return true;
            }
        } catch (Exception $th) {
            session()->flash('message', 'No such email with us');
            return false;
        }

    }
}