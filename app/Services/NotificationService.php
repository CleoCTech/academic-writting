<?php

namespace App\Services;

use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class NotificationService {

    public function markAsRead($notification_id)
    {

        $success = false; //flag
        DB::beginTransaction();
        try {

            Notification::where('id', $notification_id)
                    ->update(['is_read' => 1]);
            $success = true;
            if ($success) {
                DB::commit();
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            $success = false;
            throw $th;
        }

    }

}