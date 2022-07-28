<?php

namespace App\Http\Livewire\Admin\Account;

use App\Traits\SearchFilterTrait;
use App\Traits\SearchTrait;
use App\Traits\AdminPropertiesTrait;
use App\Traits\LayoutTrait;
use App\Models\Accounting\Account;
use App\Services\CompanyService;
use Livewire\Component;

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
        'update_A_list_varView' =>'updateVarView'
    ];

    public $account;
    public $account_no, $account_name, $opening_balance;
    public $status;


    public function mount()
    {
        $this->varView;
        $this->pageTitle = "Accounts";
        $this->xScope = "xCurrent";
        $this->loadingTargets = "list,create,view,edit,store,destroyPrompt,destroy,select";
        $this->isList=true;
    }
    public function render(CompanyService $companyService)
    {
        $companyInfo = $companyService->getCompany();
        $model = $companyService->getCompanyInformationModelPath();
        $data = Account::search($this->searchKeyword)
        ->where(function($query) use($companyInfo, $model){
            $query->where('accountable_id', $companyInfo->id)
            ->where('accountable_type',  $model);
        })
        ->get();
        $this->cols = [
            ['colName' => "created_at",'colCaption' => 'Date', 'type' => 'date', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "account_no", 'colCaption' => 'Account No','type' => 'text','element' => 'input', 'isKey' => true, 'isEdit' => false,'isCreate' => true, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "account_name",'colCaption' => 'Account Name', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => false,  'isSearch' => true],
            ['colName' => "opening_balance",'colCaption' => 'Opening Balance', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => false,  'isSearch' => true],
            ['colName' => "status",'colCaption' => 'Status', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "updated_at",'colCaption' => 'Date Updated', 'type' => 'date', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => false, 'isView' => true,'isSearch' => true],

        ];
        $this->keyCol = $this->getKeyCol();
        return view('livewire.admin.account.index')->with('data',$data)->layout('layouts.client');
    }
    public function view($id)
    {
        $this->account_no = $id;
        $this->varView = 'account-details';
    }
    public function create()
    {
        $this->varView = 'create-account';
    }
    public function updateVarView($value)
    {
        $this->varView = $value;
    }
}
