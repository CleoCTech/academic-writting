<?php

namespace App\Http\Livewire\Order;

use App\Events\ClientAuthSuccessEvent;
use App\Models\Order;
use App\Events\ClientHasLoggedInEvent;
use App\Models\Client;
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
        'pages' => ['required', 'numeric', 'min:1', 'not_in:1'],
        'deadline_date' => ['required', 'after:yesterday'],
        'deadline_time' => ['required'],
        'category_id' => ['required'],
        'topic' => ['required'],
        'instructions' => ['required']
    ];

    public function mount()
    {
        if (session()->has('Order')) {
            foreach (session('Order') as $key => $value)
            {
                if($value['type']=='subject_id'){
                    $this->category_id = $value['message'];
                }
                if($value['type']=='pages'){
                    $this->pages = $value['message'];
                }
                if($value['type']=='deadline_date'){
                    $this->deadline_date = $value['message'];
                }
                if($value['type']=='deadline_time'){
                    $this->deadline_time = $value['message'];
                }
            }
        }
        session()->forget('files');
        // Session::forget('files');
        $this->categories = PaperCategory::all();
    }
    public function store()
    {
        Session::forget('Order');
        $this->validate();
        $this->storeInSession();
        //go to next view
        if (session()->has('LoggedClient')) {
            $client = Client::where('id', session()->get('LoggedClient'))->first();
            event( new ClientAuthSuccessEvent($client));
            // event( new ClientHasLoggedInEvent($client->auth_email, $client->auth_pass));
            // $this->emitUp('update_varView', 'auth');
        } else {
            $this->emitUp('update_varView', 'auth');
        }

        // if (Auth::check()) {
        //     $this->emitUp('update_varView', 'step4');
        // }else{
        //     $this->emitUp('update_varView', 'auth');
        // }

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
