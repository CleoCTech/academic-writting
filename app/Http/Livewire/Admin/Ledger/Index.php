<?php

namespace App\Http\Livewire\Admin\Ledger;

use App\Models\Accounting\LedgerAccount;
use App\Traits\SearchFilterTrait;
use App\Traits\SearchTrait;
use App\Traits\AdminPropertiesTrait;
use App\Traits\LayoutTrait;

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

    public $account_no, $journal, $period_id, $debited_amount, $credited_amount, $created_at, $updated_at;

    public function mount(){

        $this->varView;
        $this->pageTitle = "Ledger";
        $this->xScope = "xCurrent";
        $this->loadingTargets = "list,create,view,edit,store,destroyPrompt,destroy,select";
        $this->isList=true;
    }

    public function render()
    {
        $data = LedgerAccount::search($this->searchKeyword)->get();
        $this->cols = [
            ['colName' => "created_at",'colCaption' => 'Date', 'type' => 'date', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "id", 'colCaption' => 'ID','type' => 'integer','element' => 'input', 'isKey' => true, 'isEdit' => false,'isCreate' => false, 'isList' => false, 'isView' => false,'isSearch' => false],
            ['colName' => "account_no",'colCaption' => 'Account No', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => false, 'isSearch' => true, 'isRelationship' => true,'relName' => 'account'],
            ['colName' => "journal",'colCaption' => 'Journal', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => false,  'isSearch' => true],
            ['colName' => "period_name",'colCaption' => 'Period Name', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => false,  'isSearch' => true, 'isRelationship' => true,'relName' => 'period'],
            ['colName' => "debited_amount",'colCaption' => 'Debited', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "credited_amount",'colCaption' => 'Credited', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => true, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "updated_at",'colCaption' => 'Date Updated', 'type' => 'date', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => false, 'isView' => true,'isSearch' => true],

        ];
        $this->keyCol = $this->getKeyCol();
        return view('livewire.admin.ledger.index')->with('data',$data)->layout('layouts.client');
    }
}
