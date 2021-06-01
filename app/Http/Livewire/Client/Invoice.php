<?php

namespace App\Http\Livewire\Client;

use App\Models\OrderBilling;
use App\Traits\SearchTrait;
use App\Traits\LayoutTrait;
use App\Traits\AdminPropertiesTrait;
use App\Traits\SearchFilterTrait;
use Livewire\Component;

class Invoice extends Component
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

    public $orderId, $amount, $total_amount, $paid_amount,$prepared_by;
    
    public function mount(){
        $this->pageTitle = "Invoice";
        $this->xScope = "xCurrent";
        $this->loadingTargets = "list,create,view,edit,store,destroyPrompt,destroy,select";
        $this->isList=true;
    }
    
    public function render()
    {
        // $data = OrderBilling::search($this->searchKeyword)->with('timezone', 'timeslot')->paginate(30);

        $this->cols = [
            ['colName' => "id", 'colCaption' => 'ID','type' => 'integer','element' => 'input', 'isKey' => true, 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => false,'isSearch' => false],
            ['colName' => "order_id",'colCaption' => 'First Name', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "amount",'colCaption' => 'Last Name', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "total_amount",'colCaption' => 'Email', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "paid_amount",'colCaption' => 'Scheduled Date', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "prepared_by",'colCaption' => 'Gender', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "phone",'colCaption' => 'Phone', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "timezone_id",'colCaption' => 'Timezone', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => false, 'isView' => false,'isSearch' => true],
            ['colName' => "diff_from_gtm",'colCaption' => 'Timezone', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => true,'isRelationship' => true,'relName' => 'timezone','isSearch' => false],
            ['colName' => "timeslot_id",'colCaption' => 'Schechuled Time', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => false, 'isView' => false,'isSearch' => true],
            ['colName' => "name",'colCaption' => 'Schechuled Time', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => true, 'isView' => true, 'isRelationship' => true,'relName' => 'timeslot','isSearch' => true],
            ['colName' => "subject",'colCaption' => 'Subject', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "created_at",'colCaption' => 'Date Created', 'type' => 'date', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "updated_at",'colCaption' => 'Date Updated', 'type' => 'date', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => false, 'isView' => true,'isSearch' => true],

        ];
        return view('livewire.client.invoice')->layout('layouts.client');;
    }
}