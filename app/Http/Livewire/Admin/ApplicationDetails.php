<?php

namespace App\Http\Livewire\Admin;

use App\Models\Writer;
use App\Models\AssignmentHandle;
use App\Models\EducationCert;
use App\Models\IdVerification;
use App\Models\Service;
use App\Models\SubjectHandle;
use App\Models\Test;
use App\Models\VerificationDetails;
use App\Models\WorkExperience;
use Livewire\Component;

class ApplicationDetails extends Component
{

    public $modal;
    public $aboutMeShort, $aboutMeDetail, $degree, $avatar, $fName, $lName, $dob;
    public $listTypes =[];
    public $listSubjects =[];
    public $IdentityDetails =[];
    public $IdentityKey =[];
    public $EducationDetails =[];
    public $WorkExpriences =[];
    public $testDetails =[];
    public $services =[];
    public $component;
    public $writerId;
    public $educationVerified = false;
    public $cvVerified = false;
    public $listeners = [
        'viewId' => 'mount',
        'Refresh' => 'mount',
    ];

    public function mount()
    {
        $id = session()->get('viewId');
        $this->writerId = $id;
        $this->getAssignment($id);
        $this->getIdentity($id);
        $this->getEducationDetails($id);
        $this->getWorkExperience($id);
    }
    public function render()
    {
        return view('livewire.admin.application-details');
    }
    public function getAssignment($id)
    {
        $writerPorfolio = Writer::where('id',$id)
                                 ->first();

        if ($writerPorfolio->about_long != null) {
            $this->aboutMeDetail = $writerPorfolio->about_long;
        }
        if ($writerPorfolio->about_short != null) {
            $this->aboutMeShort = $writerPorfolio->about_short;
        }
        if ($writerPorfolio->degree != null) {
            $this->degree = $writerPorfolio->degree;
        }
        if ($writerPorfolio->avatar != null) {
            $this->avatar = $writerPorfolio->avatar;
            $this->emit('preview_img');
        }
        if ($writerPorfolio->firstname != null) {
            $this->fName = $writerPorfolio->firstname;
        }
        if ($writerPorfolio->lastname != null) {
            $this->lName = $writerPorfolio->lastname;
        }
        if ($writerPorfolio->dob != null) {
            $this->dob = $writerPorfolio->dob;
        }
        if ($writerPorfolio->degree != null) {
            $this->degree = $writerPorfolio->degree;
        }
        $this->listTypes = AssignmentHandle::where('writer_id', $id)
                                            ->get();
        $this->listSubjects = SubjectHandle::where('writer_id', $id)
                                            ->get();
        $this->services = Service::where('writer_id', $id)
                                    ->get();
        // while ($a <= 10) {
        //     # code...
        // }
        // for ($i=0; $i < ; $i++) {
        //     # code...
        // }
    }
    public function changeComponent($component)
    {
        $this->component = $component;
        $id = session()->get('viewId');
        session()->put('writerId', $id);
    }
    public function getIdentity($id)
    {
        $this->IdentityKey = IdVerification::where('writer_id', $id)
                                            ->first();
                                            // dd($this->IdentityKey->id);
        $this->IdentityDetails = VerificationDetails::where('verify_id', $this->IdentityKey->id)
                                                    ->get();
    }
    public function getEducationDetails($id)
    {
        $this->EducationDetails = EducationCert::where('writer_id', $id)
                                                    ->get();
        foreach ($this->EducationDetails as $key => $EducationDetail) {
            if ($EducationDetail->status == "verified") {
                $this->educationVerified = true;
            }
            if ($EducationDetail->status == "unverified") {
                $this->educationVerified = false;
            }
        }
    }
    public function getWorkExperience($id)
    {
        $this->WorkExpriences = WorkExperience::where('writer_id', $id)
                                                ->get();
         foreach ($this->WorkExpriences as $key => $WorkExprience) {
             if ($WorkExprience->status == "verified") {
                 $this->cvVerified = true;
             }
             if ($WorkExprience->status == "unverified") {
                 $this->cvVerified = false;
             }
         }
    }
    public function getTestDetails()
    {
        $id = session()->get('viewId');
        session()->put('id', $id);
    }
    public function varView($view)
    {
        return redirect()->route('applications');
        // $this->emit('varView', '$view');
    }
    public function getDownload($value, $path)
    {

        $file= 'storage/'.$path.'/' .$value;
        return response()->download($file);

    }
    public function verifyIdentity()
    {
        $update = IdVerification::where('writer_id', $this->writerId)
                       ->update([
                            'status' => 'verified',
                            'verified_by' => auth()->user()->id
                       ]);
        if ($update) {
            session()->flash('success', 'Verified Successfully');
            $this->emit('alert_remove');
            $this->emit('Refresh');
        }
    }
    public function revertIdentity()
    {
        $update = IdVerification::where('writer_id', $this->writerId)
                       ->update([
                            'status' => 'unverified',
                            'verified_by' => auth()->user()->id
                       ]);
        if ($update) {
            session()->flash('success', 'Verification Reversed');
            $this->emit('alert_remove');
            $this->emit('Refresh');
        }
    }
    public function verifyEducation()
    {
        $update = EducationCert::where('writer_id', $this->writerId)
                       ->update([
                            'status' => 'verified',
                            'verified_by' => auth()->user()->id
                       ]);
        if ($update) {
            session()->flash('success', 'Verified Successfully');
            $this->emit('alert_remove');
            $this->emit('Refresh');
        }
    }
    public function revertEducation()
    {
        $update = EducationCert::where('writer_id', $this->writerId)
                       ->update([
                            'status' => 'unverified',
                            'verified_by' => auth()->user()->id
                       ]);
        if ($update) {
            session()->flash('success', 'Verification Reversed');
            $this->emit('alert_remove');
            $this->emit('Refresh');
        }
    }
    public function verifyCV()
    {
        $update = WorkExperience::where('writer_id', $this->writerId)
                       ->update([
                            'status' => 'verified',
                            'verified_by' => auth()->user()->id
                       ]);
        if ($update) {
            session()->flash('success', 'Verified Successfully');
            $this->emit('alert_remove');
            $this->emit('Refresh');
        }
    }
    public function revertCV()
    {
        $update = WorkExperience::where('writer_id', $this->writerId)
                       ->update([
                            'status' => 'unverified',
                            'verified_by' => auth()->user()->id
                       ]);
        if ($update) {
            session()->flash('success', 'Verification Reversed');
            $this->emit('alert_remove');
            $this->emit('Refresh');
        }
    }
}
