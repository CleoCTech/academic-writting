<?php

namespace App\Http\Livewire\Order;

use App\Models\Order;
use App\Models\PaperCategory;
use App\Traits\SendAlerts;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class PlaceOrder extends Component
{
    use SendAlerts;

    public $categories=[];
    public $category_id, $order_no, $client_id, $topic, $pages, $deadline_date, $deadline_time, $instructions='';
    public $status='Pending';

    protected $rules = [
        'pages' => ['required'],
        'deadline_date' => ['required'],
        'deadline_time' => ['required'],
        'category_id' => ['required'],
        'topic' => ['required'],
        'instructions' => ['required']
    ];

    public function mount()
    {
        session()->forget('files');
        // Session::forget('files');
        $this->categories = PaperCategory::all();
    }
    public function store()
    {
        Session::forget('Order');
        $this->validate();
        $this->storeInSession();
        // dd(session()->get('Order'));
        //go to next view
        if (Auth::check()) {
            $this->emitUp('update_varView', 'step4');
        }else{
            $this->emitUp('update_varView', 'auth');
        }

    }
    public function storeInSession()
    {
        $this->genarateOrderNo();
        $this->storeData('Order', 'order_no', $this->order_no);
        $this->storeData('Order', 'subject_id', $this->category_id);
        $this->storeData('Order', 'topic', $this->topic);
        $this->storeData('Order', 'pages', $this->pages);
        $this->storeData('Order', 'deadline_date', $this->deadline_date);
        $this->storeData('Order', 'deadline_time', $this->deadline_time);
        $this->storeData('Order', 'instructions', $this->instructions);
        $this->storeData('Order', 'status', $this->status);

    }
    public function genarateOrderNo()
    {
        $order_no =  uniqid('order_');
        // $oder_id = Order::where('order_no', $order_no)->get();
        // if ($oder_id) {
        //     $this->genarateOrderNo();
        // }
        return $this->order_no = $order_no;
    }
    public function render()
    {
        return view('livewire.order.place-order');
    }
}