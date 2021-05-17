<?php

namespace App\Http\Livewire\Client;

use App\Models\Order;
use App\Traits\AdminPropertiesTrait;
use App\Traits\LayoutTrait;
use App\Traits\SearchFilterTrait;
use Livewire\Component;

class Dashboard extends Component
{
    use LayoutTrait;
    use AdminPropertiesTrait;
    use SearchFilterTrait;
    use SearchFilterTrait;

    protected $listeners = ['update_varView'=> 'updateVarView' ];
    public $varView, $orderId, $client_id, $subject_id, $topic, $pages, $deadline_date, $deadline_time,$instructions, $status, $created_at, $updated_at;

    public function updateVarView($varValue)
    {
        $this->varView=$varValue;
    }
    public function mount()
    {
        $this->varView="home";
    }
    public function render()
    {
        $orders = collect(Order::search($this->searchKeyword)->with('order')->where('client_id', 14)->get());
        // dd($orders);
        // $orders = collect(Order::with('order')->where('client_id', 14)->get());
        $pending_orders = $orders->where('status', 'Pending');
        // dd($pending_orders);
        $others = $orders->whereNotIn('status', 'Pending');
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
        // dd($pending_orders); ->with(['pending_orders'=>$pending_orders, 'others'=>$others])
        $this->keyCol = $this->getKeyCol();
        return view('livewire.client.dashboard')->with(['pending_orders'=>$pending_orders, 'others'=>$others])->layout('layouts.client');
    }
    public function home()
    {
        $this->resetFields();
        $this->varView='home';
    }
    public function chat($value)
    {
        $this->resetFields();
        session()->put('orderId', $value);
        $this->varView='chat';
    }
    public function resetFields()
    {
        $this->varView='';
    }
}