<?php

namespace App\Http\Livewire\Dashboard\Pages\Profile;

use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $password, $confirm_password, $old_password;

    protected $rules = [
        'old_password' => 'required',
        'password' => 'required',
        'confirm_password' => 'required',
    ];

    public function render()
    {
        return view('livewire.dashboard.pages.profile.change-password');
    }
    public function store()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            $check = Client::where('id', session()->get('LoggedClient'))->first();
            dump(Hash::make($this->old_password));
            dd($check->password);
            if (!Hash::check($this->old_password, $check->password)) {
                session()->flash('error', 'Wrong password!');
                return;
            }
            if ($this->password != $this->confirm_password) {
                session()->flash('error', 'Passwords do not match!');
                return;
            }
            Client::where('id', session()->get('LoggedClient'))
            ->update([
                'password'=> Hash::make($this->password),
            ]);
            //send email with password changed event here;
            DB::commit();
            $this->emitSelf('refresh');
            session()->flash('status', 'Updated successful!');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
