<?php

namespace App\Http\Livewire\Writer\Order;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MyOrders extends Component
{
    public function render()
    {
        $writerId = session()->get('AuthWriter');
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
        return view('livewire.writer.order.my-orders')->with([
                                                            'active'=>$active
                                                        ])
                                                        ->layout('layouts.client');;
    }
    public function calDeadline($toDate, $toTime)
   {
       $current_date = now();
       $date = Carbon::parse($toDate)->addHours($toTime);
       $diff = $current_date->shortAbsoluteDiffForHumans($date);

       return $diff;
   }
   public function orderdetails($orderId)
   {
       session()->put('orderId', $orderId);
       $this->emitUp('update_varView', 'order-details');
   }
}