<?php

namespace App\Http\Livewire\Dashboard\Pages;

use App\Models\OrderBilling;
use App\Traits\SearchTrait;
use App\Traits\LayoutTrait;
use App\Traits\AdminPropertiesTrait;
use App\Traits\SearchFilterTrait;
use Livewire\WithPagination;
use App\Models\Notification;
use Livewire\Component;

class Invoices extends Component
{
    use LayoutTrait;
    use AdminPropertiesTrait;
    use SearchFilterTrait;
    use SearchTrait;
    use WithPagination;

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

    public $order_id,$client_id, $amount, $total_amount, $paid_amount, $prepared_by, $activity;
    public $paidStatus =false;
    public $confirm_invoice=false;
    public $varView;
    public $activity_id;
    public $fee;
    protected $listeners = ['go_back'=> 'goBack' ];

    public function goBack($varValue)
    {
        $this->varView = $varValue;
    }
    public function mount(){
        $this->varView;
        $this->pageTitle = "Invoice";
        $this->xScope = "xCurrent";
        $this->loadingTargets = "list,create,view,edit,store,destroyPrompt,destroy,select";
        $this->isList=true;
    }
    public function render()
    {
        if (session()->get('LoggedClient')!=null) {
            $id = session()->get('LoggedClient');
            $data = OrderBilling::search($this->searchKeyword)
                            ->with('client')
                            ->where('client_id', $id)
                            ->latest()
                            ->paginate(6);
        }
        if (auth()->user()!=null) {
            $data = OrderBilling::search($this->searchKeyword)
                            ->with('client')
                            ->latest()
                            ->paginate(6);
        }



        $this->cols = [
            ['colName' => "created_at",'colCaption' => 'Date', 'type' => 'date', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "id", 'colCaption' => 'ID','type' => 'integer','element' => 'input', 'isKey' => true, 'isEdit' => false,'isCreate' => false, 'isList' => false, 'isView' => false,'isSearch' => false],
            ['colName' => "order_no",'colCaption' => 'Order No', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => false, 'isRelationship' => true,'relName' => 'order', 'isSearch' => true],
            ['colName' => "topic",'colCaption' => 'Details', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => false, 'isRelationship' => true,'relName' => 'order', 'isSearch' => true],
            // ['colName' => "instruction",'colCaption' => 'More Details', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => false, 'isRelationship' => true,'relName' => 'order', 'isSearch' => true],
            // ['colName' => "client_id",'colCaption' => 'First Name', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => true, 'isView' => false, 'isRelationship' => true,'relName' => 'client', 'isSearch' => true],
            ['colName' => "amount",'colCaption' => 'Amount', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => false, 'isView' => true,'isSearch' => true],
            ['colName' => "total_amount",'colCaption' => 'Total Amount', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "paid_amount",'colCaption' => 'Paid Amount', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => false, 'isView' => true,'isSearch' => true],
            ['colName' => "prepared_by",'colCaption' => 'By', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => false, 'isView' => true,'isSearch' => true],

            ['colName' => "updated_at",'colCaption' => 'Date Updated', 'type' => 'date', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => false, 'isView' => true,'isSearch' => true],

        ];

        $this->keyCol = $this->getKeyCol();

        $this->activity = Notification::
            where('toable_type', 'App\Models\Client')
            ->where('toable_id', session()->get('LoggedClient'))
            ->where('status', 'waiting')
            ->latest()
            ->first();

        if ($this->activity) {
            if ($this->activity->title == "Sent Invoice") {
                $this->confirm_invoice =true;
                $this->activity_id = $this->activity->id;
                $this->fee = $this->activity->value;

            }elseif($this->activity->title == "Sent Invoice" && $this->activity->status == "responded" || $this->activity->status == "rejected"){
                $this->confirm_invoice =false;
            }
        }
        return view('livewire.dashboard.pages.invoices')
        ->with('data',$data)
        ->layout('layouts.moderndashboard');
    }
    public function checkPaidStatus($orderId)
    {
        $bill = OrderBilling::where('id', $orderId)->first();
        if (($bill->total_amount - $bill->paid_amount) !=0 || ($bill->total_amount - $bill->paid_amount) <0 ) {
            $this->paidStatus = false;
        }else{
            $this->paidStatus = true;
        }

    }
    public function checkBalance($orderId)
    {
        $bill = OrderBilling::where('id', $orderId)->first();

        return ($bill->total_amount - $bill->paid_amount);
     }
    public function checkOrder($billId)
    {
        session()->put('billId', $billId);
        $this->varView = "check-order";
    }
}
