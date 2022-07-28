<?php

namespace App\Http\Livewire\Dashboard\Pages;

use App\Models\Client;
use App\Models\ClientFile;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Profile extends Component
{
    public $client;
    public $section='';

    public function render()
    {
        if(session()->get('LoggedClient') !=null) {
            $this->client = Client::where('id', session()->get('LoggedClient'))->first();
        }
        $ordersCount = Order::where('client_id', $this->client->id)->get()->count();
        $files = ClientFile::where('client_id', $this->client->id)
        ->where(function ($query){
            $query->orwhere('from', 'company')
            ->orwhere('from', 'client');
        })
        ->latest()
        ->take(4)
        ->get();
        $latestPayments = Payment::whereHas('client')
        ->with('client')
        ->where('client_id',$this->client->id)
        ->latest()
        ->take(3)
        ->get();
        $latestOrders = Order::whereHas('order', function($query){
            $query->where('client_id', session()->get('LoggedClient'));
        })
        ->with('order')
        ->latest()
        ->take(3)
        ->get();

        return view('livewire.dashboard.pages.profile', [
            'ordersCount' => $ordersCount,
            'files' => $files,
            'latestPayments' => $latestPayments,
            'latestOrders' => $latestOrders,
        ])
        ->layout('layouts.moderndashboard');
    }
    public function back()
    {
        $this->emit('update_varView', '');
    }
    public function section($value)
    {
        $this->section = $value;
    }
    public function filesize($folder, $filename)
    {
        if (Storage::disk('public')->exists('client_files/'.$folder.'/'.$filename)) {
            return $this->format_bytes(Storage::size('client_files/'.$folder. '/'. $filename));
        }else{
            return 'No Actual File';
        }

    }
    function format_bytes($bytes, $precision = 2) {
        $units = array('B', 'KB', 'MB', 'GB');

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1000));
        $pow = min($pow, count($units) - 1);

        $bytes /= pow(1000, $pow);

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}