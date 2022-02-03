<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Order;
use App\Models\RejectedOrder;
use App\Traits\AdminPropertiesTrait;
use App\Traits\LayoutTrait;
use App\Traits\SearchFilterTrait;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithPagination;
use Livewire\Component;

class Home extends Component
{
    use LayoutTrait;
    use AdminPropertiesTrait;
    use SearchFilterTrait;
    use SearchFilterTrait;
    use WithPagination;

    public $varView, $orderId, $client_id, $subject_id, $topic, $pages, $deadline_date, $deadline_time,$instructions, $status, $created_at, $updated_at;
    public $editorderId;
    protected $listeners = [
        'update_varView'=> 'updateVarView',
        'Incoming-Request'=> 'chat',
        'edit-order'=> 'editOrder',
     ];

    public function updateVarView($varValue)
    {
        $this->varView=$varValue;
    }
    public function render()
    {
        $perPage = 4;

        $orders = collect(Order::search($this->searchKeyword)->with('order')->where('client_id', session()->get('LoggedClient'))->get());

            $pending_ordersZ = $orders->where('status', 'Pending');
            $pending_orders = $pending_ordersZ->forPage($this->page, $perPage);
            $pending_orders = new LengthAwarePaginator($pending_orders, $pending_ordersZ->count(), $perPage, $this->page);

        $othersZ = $orders->whereNotIn('status', 'Pending');
        $others = $othersZ->forPage($this->page, $perPage);
        $others = new LengthAwarePaginator($others, $othersZ->count(), $perPage, $this->page);

        $ongoingZ = $orders->whereIn('status', 'In progress');
        $ongoing = $ongoingZ->forPage($this->page, 8);
        $ongoing = new LengthAwarePaginator($ongoing, $ongoingZ->count(), 8, $this->page);

        $completeZ = $orders->whereIn('status', 'Complete');
        $complete = $completeZ->forPage($this->page, $perPage);
        $complete = new LengthAwarePaginator($ongoing, $completeZ->count(), $perPage, $this->page);

        $cancelledZ = $orders->whereIn('status', 'Cancelled');
        $cancelled = $cancelledZ->forPage($this->page, $perPage);
        $cancelled = new LengthAwarePaginator($ongoing, $cancelledZ->count(), $perPage, $this->page);

        $revisions =  RejectedOrder::where('from', 'client')
                                    ->where('from_id', session()->get('LoggedClient'))
                                    ->latest()->paginate(8);
        $this->cols = [
            ['colName' => "created_at",'colCaption' => 'Date', 'type' => 'date', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "order_no",'colCaption' => 'Order ID', 'type' => 'text', 'element' => 'input', 'isKey' => true, 'isEdit' => false,'isCreate' => true, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "client_id",'colCaption' => 'Client', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => false, 'isView' => false,'isSearch' => true],
            ['colName' => "subject_id",'colCaption' => 'Subject', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => false, 'isView' => false,'isSearch' => false],
            ['colName' => "subject",'colCaption' => 'Subject', 'type' => 'text', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => true, 'isView' => true, 'isRelationship' => true,'relName' => 'category','isSearch' => true],
            ['colName' => "topic",'colCaption' => 'Topic', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => true, 'isView' => false,'isSearch' => true],
            ['colName' => "pages",'colCaption' => 'Pages', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => false, 'isView' => false,'isSearch' => true],
            ['colName' => "deadline_date",'colCaption' => 'Deadline Date', 'type' => 'date', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => false, 'isView' => true,'isSearch' => true],
            ['colName' => "deadline_time",'colCaption' => 'Deadline Time', 'type' => 'time', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => false, 'isView' => true,'isSearch' => true],
            ['colName' => "instructions",'colCaption' => 'Details', 'type' => 'textarea', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => false, 'isView' => true, 'isRelationship' => true,'relName' => 'timeslot','isSearch' => true],
            ['colName' => "status",'colCaption' => 'Status', 'type' => 'text', 'element' => 'input', 'isEdit' => true,'isCreate' => true, 'isList' => true, 'isView' => true,'isSearch' => true],
            ['colName' => "updated_at",'colCaption' => 'Date Updated', 'type' => 'date', 'element' => 'input', 'isEdit' => false,'isCreate' => false, 'isList' => false, 'isView' => true,'isSearch' => true],

        ];
        $this->keyCol = $this->getKeyCol();
        return view('livewire.dashboard.home')
        ->with(['pending_orders'=>$pending_orders,
                'others'=>$others, 'revisions'=>$revisions,
                'ongoing'=>$ongoing, 'complete'=>$complete,
                'cancelled'=>$cancelled])
        ->layout('layouts.moderndashboard');
    }

    public function chat($value)
    {
        session()->put('orderId', $value);
        $this->varView='chat';
    }
    public function editOrder($value)
    {
        $this->editorderId =  $value;
        $this->varView='edit-paper';
    }

}
