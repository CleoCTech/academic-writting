<?php

namespace App\Http\Livewire\Writer\Settings;

use App\Models\AssignmentHandle;
use App\Models\EducationCert;
use App\Models\IdVerification;
use App\Models\Service;
use App\Models\SubjectHandle;
use App\Models\Test;
use App\Models\WorkExperience;
use App\Models\Writer;
use Livewire\Component;

class Progress extends Component
{

    public  $contacts, $profile , $first_section, $second_section, $third_section, $id_verification, $education, $work, $test, $payment, $depo, $review = false;
    public $stage = 0;
    public function mount()
    {
        if (session()->has('AuthWriter')) {
            # code...

        $writer = Writer::where('id', session()->get('AuthWriter'))->first();
        if ($writer->firstname != null && $writer->lastname != null && $writer->dob != null) {
            $this->contacts = true;
            $this->stage = 1;
        }
        if ($writer->avatar != null && $writer->about_long != null && $writer->about_short != null && $writer->degree != null ) {
            $services = Service::where('writer_id', $writer->id)->get();
            $subjects = SubjectHandle::where('writer_id', $writer->id)->get();
            $assignmentType = AssignmentHandle::where('writer_id', $writer->id)->get();
            if ($services !=null && $subjects !=null && $assignmentType !=null) {
                $this->profile = true;
                $this->first_section = true;
                $this->stage = 2;

                $ID_verification = IdVerification::where('writer_id', $writer->id)->first();
                if ($ID_verification) {
                    $this->id_verification = true;
                    $this->stage = 3;
                }
                $edu = EducationCert::where('writer_id', $writer->id)->first();
                if ($edu) {
                    $this->education = true;
                    $this->stage = 4;
                }
                $work = WorkExperience::where('writer_id', $writer->id)->first();
                if ($work) {
                    $this->work = true;
                    $this->stage = 5;
                }
                $test = Test::where('writer_id', $writer->id)->first();
                if ($test) {
                    $this->test = true;
                    $this->stage = 6;
                }
                if ($this->id_verification && $this->education && $this->work && $this->test) {
                    $this->second_section = true;
                    $this->stage = 6;
                }
            }
        }
        }
    }
    public function render()
    {
        return view('livewire.writer.settings.progress');
    }

    public function settings($component)
    {
        // dd(session()->get('AuthWriter'));
        $this->emit('component', $component);
        if ($component == 'test') {

            $findTest = Test::where('writer_id', session()->get('AuthWriter'))->first();
            if ($findTest) {
                session()->flash('error', 'You already did test. Kindly wait for review');
                $this->emit('component', '');
                $this->emit('alert_remove');
            }
        } else {
            $this->emit('component', $component);
        }

    }
}
