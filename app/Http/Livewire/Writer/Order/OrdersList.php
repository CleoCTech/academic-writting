<?php

namespace App\Http\Livewire\Writer\Order;

use App\Models\WriterBid;
use App\Models\WriterOrder;
use App\Traits\AdminPropertiesTrait;
use App\Traits\LayoutTrait;
use App\Traits\SearchFilterTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrdersList extends Component
{
    use LayoutTrait;
    use AdminPropertiesTrait;
    use SearchFilterTrait;
    use SearchFilterTrait;

    protected $listeners = ['update_varView'=> 'updateVarView' ];
    public $centerView='';
    public $varView;
    public $quickStats = true;
    public $menuButtons = true;

    public function updateVarView($varValue)
    {
        $this->varView=$varValue;
    }
    public function mount()
    {
        // session()->forget('retainView');
        abort_if(session()->get('AuthWriter') == '', 500, "Not allowed to view this page");
        if (session()->has('retainView')) {
            $this->orderdetails(session()->pull('retainView'));
        }
        $this->varView;
    }
    public function render()
    {
        $writerId = session()->get('AuthWriter');
        $bids = WriterBid::with('writer')
                        ->where('writer_id', session()->get('AuthWriter'))
                        ->where('status', 'Active')
                        ->get();
        $activeOrders = WriterOrder::with('writer')
                                ->where('writer_id', session()->get('AuthWriter'))->get();

        $active = DB::select('SELECT
                    `writer_orders`.`order_id`
                    , `orders`.`order_no`
                    , `paper_categories`.`subject`
                    , `orders`.`pages`
                    , `orders`.`deadline_date`
                    , `orders`.`deadline_time`
                    , `writer_orders`.`status`
                    , `writer_orders`.`writer_id`
                    , `order_billings`.`sale_price`
                FROM
                    `orders`
                    INNER JOIN `paper_categories`
                        ON (`orders`.`subject_id` = `paper_categories`.`id`)
                    INNER JOIN `order_billings`
                        ON (`order_billings`.`order_id` = `orders`.`id`)
                    INNER JOIN `writer_orders`
                        ON (`writer_orders`.`order_id` = `orders`.`id`)
                    INNER JOIN `writers`
                        ON (`writer_orders`.`writer_id` = `writers`.`id`)
                WHERE (`writer_orders`.`status` ="Active"
                    AND `writer_orders`.`writer_id` =?);', [$writerId]);

        return view('livewire.writer.order.orders-list')
                        ->with([
                            'bids'=>$bids,
                            'activeOrders'=>$activeOrders,
                            'active'=>$active
                        ])
                        ->layout('layouts.client');
    }

    public function bids()
    {
        $this->resetCenterView();
        $this->quickStats=false;
        $this->menuButtons=false;
        $this->centerView = 'bids';

   }
   public function calDeadline($toDate, $toTime)
   {
       $current_date = now();
       $date = Carbon::parse($toDate)->addHours($toTime);
       $diff = $current_date->shortAbsoluteDiffForHumans($date);

       return $diff;
   }
   public function resetCenterView()
   {
        $this->quickStats=true;
        $this->menuButtons=true;
        $this->centerView='';
   }
   public function orderdetails($orderId)
   {
       session()->put('orderId', $orderId);
       $this->varView = "order-details";
       $this->dispatchBrowserEvent('swal', ['title' => 'Feedback Saved']);
   }
   public function progress()
   {
       $this->varView = "my-orders";
   }
}