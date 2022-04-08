<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserService {

    public function activateAccount($id)
    {
        //🖊Rule_1: Any DB Modification Must Have a Transaction;
        DB::beginTransaction();
        try {
            User::where('id', $id)->update([ 'status' => 'Active',]);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return true;
        }

    }
    public function deactivateAccount($id)
    {
        //🖊Rule_1: Any DB Modification Must Have a Transaction;
        DB::beginTransaction();
        try {
            User::where('id', $id)->update([ 'status' => 'Inactive',]);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return true;
        }
    }

}