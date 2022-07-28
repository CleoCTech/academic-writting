<?php

namespace App\Services\Accounting;

use App\Models\Accounting\FiscalPeriod;
use App\Models\Accounting\LedgerAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LedgerService {

    public function ledgerEntry($account_no, $journal, $debited_amount, $credited_amount)
    {
        // dump($account_no);
        // dump($journal);
        // dump($debited_amount);
        // dump($credited_amount);
        // dd('her');
        //🖊Rule_1: Any DB Modification Must Have a Transaction;
        DB::beginTransaction();
        try {
            $period = FiscalPeriod::where('status', 'Current')->first();
            LedgerAccount::create([
                'account_no' => $account_no,
                'journal' => $journal,
                'period_id' => $period->id,
                'debited_amount' => $debited_amount,
                'credited_amount' => $credited_amount
            ]);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return false;
        }
    }

}