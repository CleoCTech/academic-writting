<?php

namespace App\Http\Livewire\Admin;

use App\Models\EducationCert;
use App\Models\IdVerification;
use App\Models\Test;
use App\Models\WorkExperience;
use App\Models\Writer;
use Livewire\Component;
use App\Traits\SearchTrait;
use App\Traits\LayoutTrait;
use App\Traits\AdminPropertiesTrait;
use App\Traits\SearchFilterTrait;

class Applications extends Component
{
    use LayoutTrait;
    use AdminPropertiesTrait;
    use SearchFilterTrait;
    use SearchTrait;

    public $pageSettings = [
        'isList' => true,
        'isNew' => false,
        'isView' => true,
        'isEdit' => true,
        'isDelete' => true,
        'isActions' => true,
        'isAttachments' => false,
        'isReports' => false,
        'isSearch' => true,
        'isSelect' => true,
    ];

    public $listeners = ['varView' => 'updatevarView'];

    public $email, $email_verified_at, $firstname, $lastname, $about_short, $degree, $status, $created_at, $updated_at;
    public $Accountstatus = false;

    public function updatevarView($view)
    {
        $this->varView = $view;
    }
    public function mount(){

        $this->varView;
        $this->pageTitle = "Applications";
        $this->xScope = "xCurrent";
        $this->loadingTargets = "list,create,view,edit,store,destroyPrompt,destroy,select";
        $this->isList=true;
    }

    public function render()
    {
        $data = Writer::search($this->searchKeyword)
                        ->whereNotNull('firstname')
                        ->whereNotNull('lastname')
                        ->whereNotNull('about_short')
                        ->whereNotNull('degree')
                        ->whereNotNull('status')
                        ->whereNotNull('email_verified_at')
                        ->where('status', 'Pending')
                        ->get();

        $this->cols = [
            ['colName' => "created_at",'colCaption' => 'Date', 'type' => 'date', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "id", 'colCaption' => 'ID','type' => 'integer','element' => 'input', 'isKey' => true, 'isEdit' => false,'isCreate' => false, 'isList' => false, 'isView' => false,'isSearch' => false],
            ['colName' => "firstname",'colCaption' => 'First Name', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => false, 'isSearch' => true],
            ['colName' => "lastname",'colCaption' => 'Last Name', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => false,  'isSearch' => true],
            ['colName' => "email",'colCaption' => 'Email Address', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => false,  'isSearch' => true],
            ['colName' => "about_short",'colCaption' => 'About', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "degree",'colCaption' => 'Degree', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => true, 'isView' => true,'isSearch' => true],

            ['colName' => "updated_at",'colCaption' => 'Date Updated', 'type' => 'date', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => false, 'isView' => true,'isSearch' => true],

        ];

        $this->keyCol = $this->getKeyCol();
        return view('livewire.admin.applications')->with('data',$data)->layout('layouts.client');
    }

    public function viewApplication($id)
    {
        session()->put('viewId', $id);
        $this->emit('viewId', $id);
        $this->varView = "application-details";
    }
    public function varView($view)
    {
        $this->varView = $view;
    }
    public function approve($id)
    {

        if ($this->checkOtherVerifications($id)) {
            Writer::where('id', $id)
                    ->update([
                        'status' => 'Active',
                    ]);
            session()->flash('success', 'Verified Successfully.');
            $this->emit('alert_remove');
            redirect()->route('applications');
        }else{
            session()->flash('success', 'Verification Failed.');
            $this->emit('alert_remove');
        }

    }
   public function checkOtherVerifications($id)
   {
        $idVerification = IdVerification::where('writer_id', $id)
                                        ->where('status', 'verified')->first();

        $education = EducationCert::where('writer_id', $id)
                                 ->where('status', 'verified')->first();
        $cv = WorkExperience::where('writer_id', $id)
                            ->where('status', 'verified')->first();

        $test = Test::where('writer_id', $id)
                    ->where('status', 'verified')->first();

        if (! $idVerification || $education || $cv || $test) {
            return true;
        }else{
            return false;
        }

   }

}
