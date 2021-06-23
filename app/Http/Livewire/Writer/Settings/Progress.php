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

    public $contacts, $profile , $first_section, $second_section, $third_section, $id_verification, $education, $work, $test, $payment, $depo, $review = false;

    public function mount()
    {
        if (session()->has('AuthWriter')) {
            # code...

        $writer = Writer::where('id', session()->get('AuthWriter'))->first();
        if ($writer->firstname != null && $writer->lastname != null && $writer->dob != null) {
            $this->contacts = true;
        }
        if ($writer->avatar != null && $writer->about_long != null && $writer->about_short != null && $writer->degree != null ) {
            $services = Service::where('writer_id', $writer->id)->get();
            $subjects = SubjectHandle::where('writer_id', $writer->id)->get();
            $assignmentType = AssignmentHandle::where('writer_id', $writer->id)->get();
            if ($services !=null && $subjects !=null && $assignmentType !=null) {
                $this->profile = true;
                $this->first_section = true;

                $ID_verification = IdVerification::where('writer_id', $writer->id)->first();
                if ($ID_verification) {
                    $this->id_verification = true;
                }
                $edu = EducationCert::where('writer_id', $writer->id)->first();
                if ($edu) {
                    $this->education = true;
                }
                $work = WorkExperience::where('writer_id', $writer->id)->first();
                if ($work) {
                    $this->work = true;
                }
                $test = Test::where('writer_id', $writer->id)->first();
                if ($test) {
                    $this->test = true;
                }
                if ($this->id_verification && $this->education && $this->work && $this->test) {
                    $this->second_section = true;
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
        $this->emit('component', $component);
    }
}
