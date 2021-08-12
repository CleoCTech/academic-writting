<?php

namespace App\Http\Livewire\Writer\Order;

use App\Models\ClientFile;
use App\Models\Order;
use App\Models\WriterBid;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ViewOrderDetails extends Component
{
    public $orderId;
    public $writerId;
    public $orderFiles =[];
    public $orderDetails =[];

    public $bidPrice, $message;
    protected $listeners = ['orderId' => 'mount'];

    // public function getOrderId($id)
    // {
    //     $this->orderId = $id;
    // }
    public function mount()
    {
        // $this->getOrderId();
        $this->orderId = session()->pull('orderId');
        $this->orderDetails = Order::where('id', $this->orderId[0])->first();
        $this->orderFiles = ClientFile::with('order')
                                ->where('order_id', $this->orderId[0])
                                ->get();
        $this->writerId = session()->get('AuthWriter');
    }
    public function render()
    {
        return view('livewire.writer.order.view-order-details');
    }
    public function calDeadline($toDate, $toTime)
    {
        $current_date = now();
        $date = Carbon::parse($toDate)->addHours($toTime);
        $diff = $current_date->shortAbsoluteDiffForHumans($date);

        return $diff;
    }
    public function getDownload($value)
    {

        $file= 'storage/client_files/' .$value;

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            session()->flash('message', 'File Does Not Exist.');
        }

    }
    public function bid()
    {

        try {
            DB::transaction(function () {
                WriterBid::create([
                    'writer_id'=>$this->writerId[0],
                    'order_id'=>$this->orderId[0],
                    'bid'=>$this->message,
                    'price'=>$this->bidPricex
                ]);
            });

            session()->flash('success', 'Bid Made Successfully');
            $this->emitUp('centerView', '');
        } catch (\Throwable $th) {
            // dd("error");✅
            session()->flash('error', $th->getMessage());
            $this->emitUp('centerView', '');
            return $th->getMessage();
        }

    }
}