<?php

namespace App\Http\Livewire\Writer\Settings;

use App\Models\PhoneNumber;
use App\Models\Writer;
use App\Traits\DeleteTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProfileSetup extends Component
{

    use DeleteTrait;

    public $phoneId, $first_name, $last_name, $dob, $email, $phone, $type,$modal;
    public $phoneNumbers = [];
    public $verified =false;
    // protected $listeners = ['mount'];
    public $listeners = ['phoneNumbersRefresh' => 'mount'];
    protected $rules = [
        'phone' => ['required', 'unique:phone_numbers', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
        'type' => ['required'],
    ];

    public function MoreUserRules()
    {
        try {
            $primaryContact = PhoneNumber::where('type', 'Primary')->first();
            if ($primaryContact) {
               session()->flash('error-modal', 'Primary Contact Exists');
               $this->emit('alert_remove');
               return true;
            }
        } catch (Exception $e) {
            $e->getMessage();
        }


    }
    public function addPhoneNumber()
    {
        $this->modal= "livewire.writer.components.add-contact-modal";
    }
    public function deleteModal($id, $model)
    {
        $this->sendId($id, $model);
        $this->modal= "livewire.writer.components.delete-modal";
    }
    public function mount()
    {
        $writer = Writer::where('id', session()->get('AuthWriter'))->first();
        $this->email = $writer->email;
        $this->first_name = $writer->firstname;
        $this->dob = $writer->dob;
        $this->last_name = $writer->lastname;
        if ($writer->email_verified_at !=null) {
            $this->verified = true;
        }
        $this->phoneNumbers = PhoneNumber::where('writer_id', session()->get('AuthWriter'))->get();
        // dd($this->phoneNumbers);
    }
    public function render()
    {
        return view('livewire.writer.settings.profile-setup');
    }
    public function settings()
    {
        $this->emit('component', '');
    }
    public function saveNames()
    {
        $update = Writer::where('id', session()->get('AuthWriter'))
                ->update([
                    'firstname' => $this->first_name,
                    'lastname' => $this->last_name,
                    'dob' => $this->dob,
                 ]);
        if ($update) {
            session()->flash('success', 'Details Updated Successfully');
            $this->emit('alert_remove');
        }else{
            session()->flash('error', 'Something went wrong');
            $this->emit('alert_remove');
        }
    }
    public function savePhoneNo()
    {
       //validate
       $this->validate();
       //check if primary exist
       if ($this->type == "Primary") {
            if ($this->MoreUserRules()) {
                return;
            }
       }
       try {
            $writer = session()->get('AuthWriter');
            $save = PhoneNumber::Create([
                'writer_id' =>$writer[0],
                'phone' =>$this->phone,
                'type' =>$this->type
            ]);

            if ($save) {
                    session()->flash('success-modal', 'Saved Successfully');
                    $this->emit('alert_remove');
                    $this->emit('phoneNumbersRefresh');
            }else{
                    session()->flash('error-modal', 'Something went wrong');
                    $this->emit('alert_remove');
            }
       } catch (\Exception $e) {
            session()->flash('error-modal',  $e->getMessage());
            $this->emit('alert_remove');
       }

    }
    public function DeletePhone()
    {
        $this->Destroy();
        $this->emit('phoneNumbersRefresh');
        $this->emit('alert_remove');
    }
}