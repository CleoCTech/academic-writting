<?php

namespace App\Http\Livewire\Writer\Order;

use App\Events\WriterCommitsOrderFilesEvent;
use App\Models\ClientFile;
use App\Models\Order;
use App\Models\WriterFile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class OrderDetails extends Component
{
    public $orderId;
    public $orderFiles =[];
    public $writerFiles =[];
    public $orderDetails =[];
    public $option1, $option2 =false;
    public $messagesTab, $orderSubmitTab =false;
    public function mount()
    {
        // $this->getOrderId();
        $this->orderId = session()->pull('orderId');
        // dd($this->orderId);
        $this->orderDetails = Order::where('id', $this->orderId)->first();
        $this->orderFiles = ClientFile::with('order')
                                ->where('order_id', $this->orderId)
                                ->get();
        $this->writerFiles = WriterFile::where('writer_id', session()->get('AuthWriter'))
                                        ->where('order_id', $this->orderId)
                                        ->get();
        $this->option1 = true;
        $this->messagesTab = true;
        // $this->writerId = session()->get('AuthWriter');
    }
    public function optionTwo()
    {
        $this->option1 = false;
        $this->option2 = true;
    }
    public function optionOne()
    {
        $this->option2 = false;
        $this->option1 = true;
    }
    public function messagesTab()
    {
        $this->orderSubmitTab = false;
        $this->messagesTab = true;
    }
    public function orderSubmitTab()
    {
        $this->messagesTab = false;
        $this->orderSubmitTab = true;
    }
    public function render()
    {
        return view('livewire.writer.order.order-details');
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

        $file= 'storage/writer_files/' .$value;

        if (file_exists($file)) {
            return response()->download($file);
        } else {
            session()->flash('message', 'File Does Not Exist.');
        }

    }
    public function deleteFile($value)
    {

        $file= 'storage/writer_files/' .$value;


        if (file_exists($file)) {

            $file = WriterFile::where('folder', $value)->first();
            if ($file) {
                Storage::move('writer_files/' .$value, 'writer_trash/' .$value);
                // rmdir(storage_path('app/public/writer_files/' .$value ));
                $file->delete();
            }
            // return response()->download($file);
            $this->dispatchBrowserEvent('swal', [
                'title' => 'File Deleted Successfuly',
                'timer'=>3000,
                'icon'=>'success',
                'toast'=>true,
                'position'=>'top-right',
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,

            ]);
        } else {
            $this->dispatchBrowserEvent('swal', [
                'title' => 'File Does Not Exist',
                'timer'=>3000,
                'icon'=>'error',
                'toast'=>true,
                'position'=>'top-right',
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,

            ]);
        }

    }
    public function sendFiles()
    {
        $writerId = session()->get('AuthWriter');
        event( new WriterCommitsOrderFilesEvent($this->orderId, $writerId));
    }
}
