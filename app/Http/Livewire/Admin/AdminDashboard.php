<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\OrderBilling;
use App\Models\RejectedOrder;
use Livewire\Component;
use App\Traits\AdminPropertiesTrait;
use App\Traits\LayoutTrait;
use App\Traits\SearchFilterTrait;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class AdminDashboard extends Component
{
    use LayoutTrait;
    use AdminPropertiesTrait;
    use SearchFilterTrait;
    use SearchFilterTrait;
    use WithPagination;

    protected $listeners = [
        'update_varView'=> 'updateVarView',
        'update_CenterView'=> 'updateCenterView',
    ];

    public $varView, $modal, $orderId, $client_id, $subject_id, $topic, $pages, $deadline_date, $deadline_time,$instructions, $status, $created_at, $updated_at;
    public $centerView='';
    public $clientPrice;
    public $newPrice;
    public $order_publishId;
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
        $perPage = 6;

        $orders = collect(Order::search($this->searchKeyword)->with('order')->latest()->get());

        $pending_ordersZ = $orders->where('status', 'Pending');
        $pending_orders = $pending_ordersZ->forPage($this->page, $perPage);
        $pending_orders = new LengthAwarePaginator($pending_orders, $pending_ordersZ->count(), $perPage, $this->page);

        $cancelledZ = $orders->whereIn('status', 'Cancelled');
        $cancelled = $cancelledZ->forPage($this->page, $perPage);
        $cancelled = new LengthAwarePaginator($cancelled, $cancelledZ->count(), $perPage, $this->page);

        $completeZ = $orders->whereIn('status', 'Complete');
        $complete = $completeZ->forPage($this->page, $perPage);
        $complete = new LengthAwarePaginator($complete, $completeZ->count(), $perPage, $this->page);

        $revisions = RejectedOrder::where('from', 'client')->latest()->paginate(6);

        $progress_ordersZ = $orders->where('status', 'In progress');
        $progress_orders = $progress_ordersZ->forPage($this->page, $perPage);
        $progress_orders = new LengthAwarePaginator($progress_orders, $progress_ordersZ->count(), $perPage, $this->page);

        // $active =  DB::select('SELECT * FROM `order_billings`  INNER JOIN `orders`
        //                                     ON (`order_billings`.`order_id` = `orders`.`id`);');

        $active = OrderBilling::with('order')->latest()->paginate(6);
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
        return view('livewire.admin.admin-dashboard')
        ->with([
            'pending_orders'=>$pending_orders,
            'progress_orders'=>$progress_orders,
            'complete'=>$complete, 'orders'=>$orders,
            'revisions'=>$revisions,
            'cancelled'=>$cancelled,
            'active'=>$active
            ])
        ->layout('layouts.client');
    }
    public function paginate($items, $perPage = 8, $page = null, $options = [])
    {
        $page = $page ?: (\Illuminate\Pagination\Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function publishOrder($id, $clientPrice)
    {
        // dd($clientPrice);
        $this->order_publishId = $id;
        // dd($clientPrice);
        $this->emit('clientPrice', $clientPrice);
        $this->clientPrice = $clientPrice;
        $this->modal= "livewire.admin.components.publish-order-modal";
    }
    public function chat($orderId)
    {
        $this->resetFields();
        session()->put('orderId', $orderId);
        $this->varView='chat';
    }
    public function bids($id)
    {
        session()->put('orderId', $id);
        $this->centerView = 'bidders';
    }
    public function updateCenterView($value)
    {
        // dd($value);
        // session()->put('orderId', $id);
        $this->centerView = $value;
    }
    public function award($id)
    {
        session()->put('orderId', $id);
        $this->centerView = 'bid-details';
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
        $this->varView ='jobs';
    }
    public function resetFields()
    {
        $this->varView ='';
    }
    public function resetCenterView()
    {
        $this->centerView ='';
    }

    //modal
    public function setNewPrice(){

        // $this->validate();


        try {
            // dd($this->order_publishId);
            // dd($this->newPrice);
            DB::transaction(function() {

                $update = OrderBilling::where('order_id', $this->order_publishId)
                                        ->update([
                                            'proposed_resell_price' => $this->newPrice,
                                        ]);
                if ($update) {
                    // dd('yes');
                    $published = Order::where('id', $this->order_publishId)
                    ->update([
                        'publish' => 1,
                    ]);

                    if ($published) {
                        session()->flash('success-modal', 'Published Successfully');
                        $this->emit('alert_remove');
                    }

                    // $this->emit('phoneNumbersRefresh');
                }
            });
            // DB::update('update order_billinga set votes = 100 where name = ?', ['John']);

        } catch (\Exception $e) {
            session()->flash('error-modal',  $e->getMessage());
            $this->emit('alert_remove');
        }

    }
}
