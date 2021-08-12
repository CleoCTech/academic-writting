<?php

namespace App\Http\Livewire\Writer;

use App\Models\SubjectHandle;
use App\Models\Writer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{

    protected $listeners = [
        'update_varView'=> 'updateVarView',
        'centerView'=> 'updatecenterView',
     ];

    public $centerView, $varView ='';
    public  $modal;
    public $quickStats = true;
    public $menuButtons = true;


    public function mount()
    {
        $status = Writer::where('id', session()->get('AuthWriter'))->first();
        if ($status) {
            if ( $status->status != "Active") {
                return redirect()->route('writer-settings');
                session()->flash('error', 'Account Under Review');
            }
        }else{
            return;
        }
    }
    public function render()
    {

        $active = DB::select('SELECT
            `orders`.`id`
            ,`orders`.`order_no`
            , `paper_categories`.`subject`
            , `orders`.`pages`
            , `order_billings`.`proposed_resell_price`
            , `orders`.`deadline_date`
            , `orders`.`deadline_time`
            , `orders`.`publish`
        FROM
            `order_billings`
            INNER JOIN `orders`
                ON (`order_billings`.`order_id` = `orders`.`id`)
            INNER JOIN `paper_categories`
                ON (`orders`.`subject_id` = `paper_categories`.`id`)
        WHERE (`orders`.`publish` =? );', [1]);


        return view('livewire.writer.dashboard')->with(['active'=>$active])->layout('layouts.client');

    }
    public function resetFields()
    {
        $this->varView='';
    }
    public function resetCenterView()
    {
        $this->centerView='';
    }
    public function updatecenterView($value)
    {
        $this->centerView=$value;
    }
    public function calDeadline($toDate, $toTime)
    {
        $current_date = now();
        $date = Carbon::parse($toDate)->addHours($toTime);
        $diff = $current_date->shortAbsoluteDiffForHumans($date);

        return $diff;
    }
    public function viewOrder($id)
    {
        $this->resetCenterView();
        // $this->emit('orderId', $id);
        session()->push('orderId', $id);
        $this->centerView = "order-details";
    }
    public function default()
    {
        $this->centerView = '';
    }
}
