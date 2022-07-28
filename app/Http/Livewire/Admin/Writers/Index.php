<?php

namespace App\Http\Livewire\Admin\Writers;

use App\Models\Writer;
use App\Services\WriterApplicationCompletionService;
use Livewire\Component;
use App\Traits\SearchFilterTrait;
use App\Traits\SearchTrait;
use App\Traits\AdminPropertiesTrait;
use App\Traits\LayoutTrait;

class Index extends Component
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

    protected $listeners = [
        'update_W_list_varView' =>'updateVarView'
    ];
    public $writer_id, $email, $email_verified_at, $firstname, $lastname, $about_short, $degree, $status, $created_at, $updated_at;
    public $online = false;

    public function mount(){

        $this->varView;
        $this->pageTitle = "Writers";
        $this->xScope = "xCurrent";
        $this->loadingTargets = "list,create,view,edit,store,destroyPrompt,destroy,select";
        $this->isList=true;
    }
    public function render()
    {
        $data = Writer::search($this->searchKeyword)
                        ->where('status', 'Active', function ($q){
                            $q->orWhere('status', 'Inactive');
                        })->get();
        $this->cols = [
            ['colName' => "created_at",'colCaption' => 'Date', 'type' => 'date', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "id", 'colCaption' => 'ID','type' => 'integer','element' => 'input', 'isKey' => true, 'isEdit' => false,'isCreate' => false, 'isList' => false, 'isView' => false,'isSearch' => false],
            ['colName' => "firstname",'colCaption' => 'First Name', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => false, 'isSearch' => true],
            ['colName' => "lastname",'colCaption' => 'Last Name', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => false,  'isSearch' => true],
            ['colName' => "email",'colCaption' => 'Email Address', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => false,  'isSearch' => true],
            ['colName' => "about_short",'colCaption' => 'About', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "degree",'colCaption' => 'Degree', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "online",'colCaption' => 'Online', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "status",'colCaption' => 'Status', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => false, 'isList' => true, 'isView' => true,'isSearch' => true],

            ['colName' => "updated_at",'colCaption' => 'Date Updated', 'type' => 'date', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => false, 'isView' => true,'isSearch' => true],

        ];
        $this->keyCol = $this->getKeyCol();
        return view('livewire.admin.writers.index')->with('data',$data)->layout('layouts.client');
    }
    public function getWriterStatus($id)
    {
        return Writer::where('id', $id)->first()->status;
    }
    public function activateWriter($id, WriterApplicationCompletionService $writerService)
    {
        if ($writerService->activateWriter($id)) {
            session()->flash('success', 'Activated Successfully.');
            $this->emit('alert_remove');
            redirect()->route('applications');
        } else {
            session()->flash('error', 'Verification Failed.');
            $this->emit('alert_remove');
        }
    }
    public function deactivateWriter($id, WriterApplicationCompletionService $writerService)
    {
        if ($writerService->deactivateWriter($id)) {
            session()->flash('success', 'Activated Successfully.');
            $this->emit('alert_remove');
            redirect()->route('applications');
        } else {
            session()->flash('error', 'Verification Failed.');
            $this->emit('alert_remove');
        }
    }
    public function view($id)
    {
        $this->writer_id = $id;
        $this->varView = 'writer-details';
    }

    public function chatbox($id)
    {
        $model = "App\Models\Writer";

        session()->put('userIdN', $id);
        session()->put('userTypeFro', $model);

        if (auth()->user()!=null) {
            return redirect()->route('admin-chat');
        }

    }
    public function updateVarView($value)
    {
        $this->varView = $value;
    }
}