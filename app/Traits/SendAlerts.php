<?php

 namespace App\Traits;

 use Illuminate\Support\Facades\Schema;


 trait SendAlerts{

    public function sendAlert(string $type, string $message): void
    {
        session()->push('alerts', ['type' => $type, 'message' => $message]);
    }
    public function storeData(string $array, string $type, string $message): void
    {
        session()->push($array, ['type' => $type, 'message' => $message]);
    }

 }

?>
