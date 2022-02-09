<?php

namespace App\Http\Livewire\Admin\Order;

use App\Events\AwardOrderEvent;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderBilling;
use App\Models\OrderStatus;
use App\Models\WriterBid;
use App\Models\WriterOrder;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class OrderBids extends Component
{
    public $bidders =[];
    public $oderId;
    public $modal;
    public $orderDetails;
    public $writerId;
    public $orderPrice;
    public $order;

    public function mount()
    {
        $this->oderId = session()->pull('orderId');
        $this->order = Order::where('id', $this->oderId)->first();
        $this->orderDetails = Order::where('id', $this->oderId)
                                    ->first();
        $this->bidders = WriterBid::where('order_id', $this->oderId)
                                    ->get();
    }
    public function render()
    {
        return view('livewire.admin.order.order-bids');
    }
    public function bidDetails($id)
    {
        session()->put('orderId', $id);
        $this->emitUp('update_CenterView', 'bid-details');
    }
    public function award($order_price, $writer_id)
    {
        //award
        //set all bids for this order inactive after
        //register order to the writer_orders
        //update sale price
        //unpublish order
        //notify user --i guess i meant writer
        // $this->oderId = $order_id;
        $this->writerId = $writer_id;
        $this->orderPrice = $order_price;

        DB::beginTransaction();
        try {

            $checkIfGiven = WriterOrder::where('order_id', $this->oderId)->first();
            if ($checkIfGiven) {
                return  $this->alert('error', 'Oops! Order has been awarded to another writer ' , [
                        'position' =>  'top-end',
                        'timer' =>  3000,
                        'toast' =>  true,
                        'text' =>  '',
                        'confirmButtonText' =>  'Ok',
                        'cancelButtonText' =>  'Cancel',
                        'showCancelButton' =>  false,
                        'showConfirmButton' =>  false,
                    ]);

            }
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
            OrderStatus::create(['order_id'=>$this->oderId, 'current_position' =>'Writer']);
            Order::where('id', $this->oderId)
                    ->update([
                        'publish'=>0
                    ]);

            Notification::create([
                'title'=> 'Order Award',
                'fromable_id' => auth()->user()->id,
                'toable_id' =>$this->writerId,
                'fromable_type' =>'App\Models\User',
                'toable_type' =>'App\Models\Writer',
                'value'=> $this->orderPrice,
                'order_no' =>$this->order->order_no,
            ]);
            DB::commit();
            event( new AwardOrderEvent);
            // session()->flash('success', 'Order Awarded Successfully');
            $this->alert('success', 'Order Awarded Successfully', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);

        } catch (Exception $e) {
            DB::rollback();
            // session()->flash('error', 'Oops! Something went wrong');
            $this->alert('error', 'Oops! Something went wrong', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
        }

    }
}
