<?php

namespace App\Http\Livewire\Writer\Settings;

use App\Models\AssignmentHandle;
use App\Models\PaperCategory;
use App\Models\Service;
use App\Models\SubjectHandle;
use App\Models\Writer;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PortfolioSetup extends Component
{
    use WithFileUploads;

    public $modal, $avatar;
    public $aboutMeShort, $aboutMeDetail, $degree;
    public $paperCats, $writerPapers =[];
    public $writerSubjects= [];
    public $listSubjects= [];
    public $listTypes= [];
    public $services= [];
    public $xservices= [];
    public $checkedSubjects= [];
    public $Writing = false;
    public $Rewriting = false;
    public $Editing = false;
    public $Proofreading = false;

    public $listeners = [
        'SubjectsRefresh' => 'mount',
        'TypesRefresh' => 'mount'
    ];
    protected $rules = [
        'aboutMeShort' => ['required'],
        'aboutMeDetail' => ['required'],
        'degree' => ['required'],
        'services' => ['required'],
        'avatar' => ['image', 'max:1024'],
    ];
    public function mount()
    {
        $this->paperCats = PaperCategory::all();
        $this->listSubjects = SubjectHandle::with('subject')
                                ->where('writer_id', session()->get('AuthWriter'))
                                ->get();
        $writerPorfolio = Writer::where('id', session()->get('AuthWriter'))
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
        $this->listTypes = AssignmentHandle::where('writer_id', session()->get('AuthWriter'))
                            ->get();
        $this->services = Service::where('writer_id', session()->get('AuthWriter'))
                            ->get();
        foreach ($this->services as $key => $service) {
            if ($service->service == "Writing") {
                $this->Writing = true;
                array_push($this->xservices, $service->service );
            }
            if ($service->service == "Rewriting") {
                $this->Rewriting = true;
                array_push($this->xservices, $service->service );
            }
            if ($service->service == "Editing") {
                $this->Editing = true;
                array_push($this->xservices, $service->service );
            }
            if ($service->service == "Proofreading") {
                $this->Proofreading = true;
                array_push($this->xservices, $service->service );
            }
        }

        foreach ($this->listSubjects as $key => $value) {
            array_push($this->writerSubjects, $value->subject_id );
        }
    }

    public function render()
    {
        return view('livewire.writer.settings.portfolio-setup');
    }
    public function settings()
    {
        $this->emit('component', '');
    }
    public function assignTypes()
    {
        $this->modal= "livewire.writer.components.add-assign-types";
    }
    public function assignSubjects()
    {
        $this->modal= "livewire.writer.components.add-assign-subjects";
    }

    public function updatePortfolio()
    {
        $this->validate();

        $storedImage=  $this->avatar->store('writer_avatar');

        $this->postServices();

        try {
            $update = Writer::where('id', session()->get('AuthWriter'))
            ->update([
                'about_short' => $this->aboutMeShort,
                'about_long' => $this->aboutMeDetail,
                'degree' => $this->degree,
                'avatar' => $storedImage,
             ]);
              // Storage::deleteDirectory('livewire-tmp');
             $files[] = Storage::allFiles('livewire-tmp');
                foreach ($files as $key => $file) {
                    Storage::delete($file);
                }
             if ($update) {
                session()->flash('success', 'Details Updated Successfully');
                $this->emit('alert_remove');
                $this->emit('TypesRefresh');
             }

        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            $this->emit('alert_remove');
        }

    }
    public function postServices()
    {
        $writer = session()->get('AuthWriter');
        $getServices = Service::where('writer_id', session()->get('AuthWriter'))->get();
        if ($getServices != null) {
            foreach ($getServices as $key => $value) {
                Service::find($value->id)->delete();
            }
        }
        try {
            foreach ($this->xservices as $key => $service) {
                Service::create([
                    'writer_id' => $writer[0],
                    'service' => $service
                ]);
            }
            session()->flash('success', 'Services Updated Successfully');
            $this->emit('alert_remove');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            $this->emit('alert_remove');
        }

    }
    public function postAssignmentHandle()
    {
        $writer = session()->get('AuthWriter');
        $getTypes = AssignmentHandle::where('writer_id', session()->get('AuthWriter'))->get();
        if ($getTypes != null) {
            foreach ($getTypes as $key => $value) {
                AssignmentHandle::find($value->id)->delete();
            }
        }
        try {
            foreach ($this->writerPapers as $key => $writerPaper) {
                AssignmentHandle::create([
                    'writer_id' => $writer[0],
                    'type' => $writerPaper
                ]);
            }
            session()->flash('success-modal', 'Saved Successfully');
            $this->emit('alert_remove');
            $this->emit('TypesRefresh');
        } catch (\Exception $e) {
            session()->flash('error-modal', $e->getMessage());
            $this->emit('alert_remove');
            $this->emit('TypesRefresh');
        }

    }
    public function postSubjectsHandle()
    {
        $writer = session()->get('AuthWriter');
        $getSubjects = SubjectHandle::where('id', session()->get('AuthWriter') )->get();
        if ($getSubjects != null) {
            foreach ($getSubjects as $key => $value) {
                SubjectHandle::find($value->id)->delete();
            }
        }

        try {
            foreach ($this->writerSubjects as $key => $writerSubject) {

                SubjectHandle::create([
                    'writer_id' => $writer[0],
                    'subject_id' => $writerSubject
                ]);
            }
            session()->flash('success-modal', 'Saved Successfully');
            $this->emit('alert_remove');
            $this->emit('SubjectsRefresh');
        } catch (\Exception $e) {
            session()->flash('error-modal', $e->getMessage());
            $this->emit('alert_remove');
            $this->emit('SubjectsRefresh');
        }

    }

}
