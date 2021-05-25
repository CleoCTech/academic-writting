<?php

namespace App\Http\Livewire\Client;

use App\Events\OrderHasBeenUpdatedEvent;
use App\Events\OrderRegisteredEvent;
use App\Models\ClientFile;
use App\Models\Order;
use App\Models\PaperCategory;
use Illuminate\Support\Facades\DB;
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
        'topic' => ['required'],
        'instructions' => ['required']
    ];
    
    public function mount()
    {
        $this->categories = PaperCategory::all();
    }
    public function back()
    {
        $this->emitUp('update_varView', '');
    }
    public function render()
    {
        $this->orderId = session()->get('orderId');
        $orderDetails = Order::with('order')
                                    ->where('order_no',  $this->orderId)
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
                                            ->get();
        return view('livewire.client.edit-order')->with('orderDetails', $orderDetails);
    }
    public function store()
    {
        $this->validate();
        DB::beginTransaction();
        try {
           Order::where('order_no',  $this->orderId)
            ->update([
                'subject_id' => $this->category_id,
                'topic' => $this->topic,
                'pages' => $this->pages,
                'deadline_date' => $this->deadline_date,
                'deadline_time' => $this->deadline_time,
                'instructions' => $this->instructions,
                ]);
                
            $order = Order::where('order_no',  $this->orderId)->first();
            DB::Commit();   
            event( new OrderRegisteredEvent($order, $this->user_id)); 
            session()->flash('success', 'Updated Successfully.');    
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error',$e);
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