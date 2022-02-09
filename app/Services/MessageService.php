<?php

namespace App\Services;

use App\Models\Messaging;
use Illuminate\Support\Facades\DB;

class MessageService {

    public function markAsRead($message_id)
    {
        $success = false; //flag
        DB::beginTransaction();
        try {

            Messaging::where('id', $message_id)
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
