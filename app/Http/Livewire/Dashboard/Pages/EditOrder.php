<?php

namespace App\Http\Livewire\Dashboard\Pages;

use App\Events\ClientEditedOrderEvent;
use App\Models\PaperCategory;
use App\Models\Order;
use App\Models\ClientFile;
use Illuminate\Support\Facades\DB;
use App\Events\OrderRegisteredEvent;
use App\Events\OrderHasBeenUpdatedEvent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class EditOrder extends Component
{
    public $categories, $clientFiles=[];
    public $pages, $deadline_date, $deadline_time, $category_id, $topic, $instructions, $orderId, $user_id, $order_id;

    protected $rules = [
        'pages' => ['required'],
        'deadline_date' => ['required'],
        'deadline_time' => ['required'],
        'category_id' => ['required'],
        'topic' => ['required'],
        'instructions' => ['required']
    ];
    protected $messages = [
        'category_id.required' => 'Select Paper Category.',
    ];
    public function mount($oderId)
    {
        $this->orderId = $oderId;
        $this->categories = PaperCategory::all();
        $orderDetails = Order::with('order')
                                    ->where('id',  $this->orderId)
                                    ->first();
        $this->pages = $orderDetails->pages;
        $this->deadline_date = $orderDetails->deadline_date;
        $this->deadline_time = $orderDetails->deadline_time;
        $this->category_id = $orderDetails->category_id;
        $this->topic = $orderDetails->topic;
        $this->instructions = $orderDetails->instructions;

        $this->user_id =$orderDetails->client_id;
        $this->order_id =$orderDetails->id;
        $this->clientFiles = ClientFile::where('client_id', $this->user_id)
                                            ->where('order_id',  $orderDetails->id)
                                            ->where('from',  'client')
                                            ->get();
    }
    public function render()
    {
        return view('livewire.dashboard.pages.edit-order');
    }
    public function back()
    {
        $this->emitUp('update_varView', 'chat');
    }
    public function store()
    {
        $this->validate();
        // dd($this->orderId);
        $success = false; //flag
        DB::beginTransaction();
        try {
            $deadline_date = Carbon::parse($this->deadline_date)->format('Y-m-d');
           Order::where('id',  $this->orderId)
            ->update([
                'subject_id' => $this->category_id,
                'topic' => $this->topic,
                'pages' => $this->pages,
                'deadline_date' => $deadline_date,
                'deadline_time' => $this->deadline_time,
                'instructions' => $this->instructions,
            ]);

            $order = Order::where('order_no',  $this->orderId)->first();
            $success = true;
            if($success){
                DB::Commit();
                event( new ClientEditedOrderEvent($order, 'Updated Successfully'));
                event( new OrderRegisteredEvent($order, $this->user_id));
                //session()->flash('success', 'Updated Successfully.');
                // dd('true');
            }
        } catch (\Exception $e) {
            DB::rollback();
            $success = false;
            event( new ClientEditedOrderEvent($order, $e->getMessage()));
            // session()->flash('error',$e);
        }

    }
    public function dropFile($folder, $filename)
    {
        Storage::delete('client_files/'.$folder . '/' .$filename);
        rmdir('storage/client_files/' .$folder );
        DB::beginTransaction();
        try {
            ClientFile::where('order_id', $this->order_id)->delete();
            DB::Commit();
            session()->flash('success', 'File Deleted Successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error',$e);
        }
    }
}