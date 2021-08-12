<?php

namespace App\Http\Livewire\Admin\Order;

use App\Events\AwardOrderEvent;
use App\Models\Order;
use App\Models\OrderBilling;
use App\Models\WriterBid;
use App\Models\WriterOrder;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BidDetails extends Component
{

    public $oderId;
    public $writerId;
    public $orderPrice;
    public $modal;
    public $orderDetails;

    public function mount()
    {
        $this->oderId = session()->get('orderId');


    }
    public function award($order_price, $writer_id)
    {
        //award
        //set all bids for this order inactive after
        //register order to the writer_orders
        //update sale price
        //unpublish order
        //notify user
        // $this->oderId = $order_id;
        $this->writerId = $writer_id;
        $this->orderPrice = $order_price;

        DB::transaction(function () {
            try {
                WriterOrder::create([
                    'writer_id'=> $this->writerId,
                    'order_id'=> $this->oderId,
                    'status'=> 'Active',
                ]);
                OrderBilling::where('order_id', $this->oderId)
                            ->update([
                                'sale_price'=>$this->orderPrice,
                                'prepared_by'=>Auth()->user()->id
                            ]);
                WriterBid::where('order_id', $this->oderId)
                        ->update([
                            'status'=>'Expired'
                        ]);

                Order::where('id', $this->oderId)
                        ->update([
                            'publishs'=>0
                        ]);
                event( new AwardOrderEvent);
                session()->flash('success', 'Order Awarded Successfully');
            } catch (\Exception $th) {
                session()->flash('error', 'Oops! Something went wrong');
            }

        });



    }
    public function render()
    {

        $this->orderDetails = DB::select('SELECT
        `orders`.`id`
        , `orders`.`order_no`
        , `writer_bids`.`price`
        , `writer_bids`.`writer_id`
        , `writer_bids`.`bid`
        , `writers`.`firstname`
        , `order_billings`.`proposed_resell_price`
        FROM
            `order_billings`
            INNER JOIN `orders`
                ON (`order_billings`.`order_id` = `orders`.`id`)
            INNER JOIN `writer_bids`
                ON (`writer_bids`.`order_id` = `orders`.`id`)
            INNER JOIN `writers`
                ON (`writer_bids`.`writer_id` = `writers`.`id`)
        WHERE (`orders`.`id` =?);', [$this->oderId]);

        return view('livewire.admin.order.bid-details');
    }
}