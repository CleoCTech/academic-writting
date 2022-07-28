<?php

namespace App\Services;

use App\Events\InvoiceSentEvent;
use App\Models\GeneralNotification;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderBilling;
use Illuminate\Support\Facades\DB;

class InvoiceService {

    public function createInvoice($title, $fromable_id, $fromable_type, $toable_id, $toable_type, $fee, $order_no)
    {
        if (Notification::where('order_no', $order_no)->where('status', 'waiting')->where('is_read',0)->exists()) {
            event( new InvoiceSentEvent());
            // return 'Order already has an Invoice';
            throw new \Exception('Order already has an Invoice');
        }
        $success = false; //flag
        DB::beginTransaction();
        try {

            Notification::create([
                'title' => $title,
                'fromable_id' => $fromable_id,
                'toable_id' => $toable_id,
                'fromable_type' => $fromable_type,
                'toable_type' => $toable_type,
                'value' => $fee,
                'order_no' => $order_no
            ]);

            $success = true;
            if ($success) {
                DB::commit();
                return true;
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            $success = false;
            throw $th;
        }

    }
    public function confirmInvoice($notification)
    {

        $success = false; //flag
        DB::beginTransaction();
        try {

            $order = Order::with('order')
            ->where('order_no', $notification->order_no)
            ->first();
            OrderBilling::create([
                'order_id' => $order->id,
                'client_id' => $notification->toable_id,
                'amount' => $notification->value,
                'total_amount' => ($order->pages * $notification->value),
                'prepared_by' => $notification->fromable_id,
            ]);

            Notification::where('id', $notification->id)
                    ->update(['status' => 'responded']);

            Order::where('id',  $order->id)
                    ->update(['status' => 'In progress']);
            GeneralNotification::create([
                'title'=>'Invoice Confirmed',
                'description'=> $notification->order_no,
                'user_group'=>'Admin_Editor',
            ]);
            $success = true;
            if ($success) {
                DB::commit();
                return true;
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            $success = false;
            throw $th;
        }

    }
    public function rejetcInvoice($notification)
    {
        $success = false; //flag
        DB::beginTransaction();
        try {

            Notification::
                where('id', $notification->id)
                ->update(['status' => 'rejected']);
            GeneralNotification::create([
                'title'=>'Invoice Rejected',
                'description'=> $notification->order_no,
                'user_group'=>'Admin_Editor',
            ]);
            $success = true;
            if ($success) {
                DB::commit();
                return true;
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            $success = false;
            throw $th;
        }

    }
}
