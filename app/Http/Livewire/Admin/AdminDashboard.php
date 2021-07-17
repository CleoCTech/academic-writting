<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\RejectedOrder;
use Livewire\Component;
use App\Traits\AdminPropertiesTrait;
use App\Traits\LayoutTrait;
use App\Traits\SearchFilterTrait;
use Carbon\Carbon;

class AdminDashboard extends Component
{
    use LayoutTrait;
    use AdminPropertiesTrait;
    use SearchFilterTrait;
    use SearchFilterTrait;

    protected $listeners = [
        'update_varView'=> 'updateVarView'
     ];
    public $varView, $orderId, $client_id, $subject_id, $topic, $pages, $deadline_date, $deadline_time,$instructions, $status, $created_at, $updated_at;
    public $centerView='';
    public $quickStats = true;
    public $menuButtons = true;
    public function updateVarView($varValue)
    {
        $this->resetFields();
        $this->varView=$varValue;
    }
    public function mount()
    {
        // $this->varView='home';
    }

    public function render()
    {
        $orders = collect(Order::search($this->searchKeyword)->with('order')->get());
        $pending_orders = $orders->where('status', 'Pending');
        $cancelled = $orders->whereIn('status', 'Cancelled');
        $complete = $orders->whereIn('status', 'Complete');
        $revisions = RejectedOrder::where('from', 'client')->get();
        $progress_orders = $orders->where('status', 'In progress');
        $this->cols = [
            ['colName' => "created_at",'colCaption' => 'Date', 'type' => 'date', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "order_no",'colCaption' => 'Order ID', 'type' => 'text', 'element' => 'input', 'isKey' => true, 'isEdit' => false,'isCreate' => true, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "client_id",'colCaption' => 'Client', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => false, 'isView' => false,'isSearch' => true],
            ['colName' => "subject_id",'colCaption' => 'Subject', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => false, 'isView' => false,'isSearch' => false],
            ['colName' => "subject",'colCaption' => 'Subject', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => true, 'isRelationship' => true,'relName' => 'category','isSearch' => true],
            ['colName' => "topic",'colCaption' => 'Topic', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => false, 'isView' => false,'isSearch' => true],
            ['colName' => "pages",'colCaption' => 'Pages', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => false, 'isView' => false,'isSearch' => true],
            ['colName' => "deadline_date",'colCaption' => 'Deadline Date', 'type' => 'date', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => false, 'isView' => true,'isSearch' => true],
            ['colName' => "deadline_time",'colCaption' => 'Deadline Time', 'type' => 'time', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => false, 'isView' => true,'isSearch' => true],
            ['colName' => "instructions",'colCaption' => 'Details', 'type' => 'textarea', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => false, 'isView' => true, 'isRelationship' => true,'relName' => 'timeslot','isSearch' => true],
            ['colName' => "status",'colCaption' => 'Status', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "updated_at",'colCaption' => 'Date Updated', 'type' => 'date', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => false, 'isView' => true,'isSearch' => true],

        ];

        $this->keyCol = $this->getKeyCol();
        return view('livewire.admin.admin-dashboard')->with(['pending_orders'=>$pending_orders, 'progress_orders'=>$progress_orders,  'complete'=>$complete, 'orders'=>$orders, 'revisions'=>$revisions, 'cancelled'=>$cancelled])->layout('layouts.client');
    }
    public function chat($orderId)
    {
        $this->resetFields();
        session()->put('orderId', $orderId);
        $this->varView='chat';
    }
    public function revisions()
    {
        session()->put('view', 'revisions');
        $this->resetCenterView();
        $this->menuButtons=false;
        $this->centerView = 'revisions';
    }
    public function doneRevisions()
    {
        session()->put('view', 'done revisions');
        $this->resetCenterView();
        $this->menuButtons=false;
        $this->centerView = 'done revisions';
    }
    public function ongoingRevisions()
    {
        session()->put('view', 'ongoing revisions');
        $this->resetCenterView();
        $this->menuButtons=false;
        $this->centerView = 'ongoing revisions';
    }
    public function pending()
    {
        $this->resetCenterView();
        $this->menuButtons=false;
        $this->centerView = 'pending';
    }
    public function progress()
    {
        $this->resetCenterView();
        $this->menuButtons=false;
        $this->centerView = 'In Progress';
    }
    public function completed()
    {
        $this->resetCenterView();
        $this->menuButtons=false;
        $this->centerView = 'Completed';
    }
    public function cancelled()
    {
        $this->resetCenterView();
        $this->menuButtons=false;
        $this->centerView = 'cancelled';
    }
    public function applications()
    {
        $this->resetCenterView();
        $this->menuButtons=false;
        $this->centerView = 'applications';
    }
    public function default()
    {
        // session()->put('view', 'revisions');
        // $this->resetCenterView();
        $this->menuButtons=true;
        $this->centerView = '';
    }
    public function jobs()
    {
        $this->resetFields();
        $this->varView='jobs';
    }
    public function resetFields()
    {
        $this->varView='';
    }
    public function resetCenterView()
    {
        $this->centerView='';
    }
}
