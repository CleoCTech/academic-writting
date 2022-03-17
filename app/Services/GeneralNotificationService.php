<?php

namespace App\Services;

use App\Models\GeneralNotification;
use Illuminate\Support\Facades\DB;

class GeneralNotificationService {

    public function markAsRead($notification_id)
    {

        $success = false; //flag
        DB::beginTransaction();
        try {

            GeneralNotification::where('id', $notification_id)
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

?>
