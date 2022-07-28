<?php

namespace App\Services\Accounting;

use App\Models\Accounting\Account;
use App\Models\Accounting\FiscalPeriod;
use App\Models\Accounting\LedgerAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AccountService {

    public function createAccount($account_no, $account_name, $accountable_id, $accountable_type, $opening_balance, $status)
    {
        if ($account_no == null) {
            $account_no = $this->generateUniqueCode();
        }
        if ($status == null) {
            $status = "Active";
        }
        DB::beginTransaction();
        try {
            $account = Account::create([
                'account_no' => $account_no,
                'account_name' => $account_name,
                'accountable_id' => $accountable_id,
                'accountable_type' => $accountable_type,
                'opening_balance' => $opening_balance,
                'status' => $status,
            ]);
            DB::commit();
            return $account;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return false;
        }

    }
    public function updateAccountBalance($account_no, $opening_balance)
    {
        DB::beginTransaction();
        try {

            $account = Account::where('account_no', $account_no)
            ->update([
                'opening_balance' => $opening_balance
            ]);
            DB::commit();
            return $account;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return false;
        }

    }
    public function getOpeningBalance($account_no)
    {
        $account = Account::where('account_no', $account_no)->first();
        return $account->opening_balance;
    }
    public function updateAccountDetails($account_no, $account_name, $status)
    {
        DB::beginTransaction();
        try {

            $account = Account::where('account_no', $account_no)
            ->update([
                'account_name' => $account_name,
                'status' => $status
            ]);
            DB::commit();
            return $account;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return false;
        }

    }
    public function getAccount($accountable_id, $model)
    {
        try {
            $account = Account::
            where(function($query) use($accountable_id, $model){
                $query->where('accountable_id', $accountable_id)
                ->where('accountable_type',  $model);
            })->first();
            return $account;
        } catch (\Throwable $th) {
            Log::error($th);
            return false;
        }

    }
    public function getModelCashFlow($model, $status)
    {
        try {
            $sum = Account::
            where(function($query) use($status, $model){
                $query->where('accountable_type', $model)
                ->where('status',  $status);
            })->sum('opening_balance');
            return $sum;
        } catch (\Throwable $th) {
            Log::error($th);
            return false;
        }

    }
    public function activateAccount($account_no)
    {
        //🖊Rule_1: Any DB Modification Must Have a Transaction;
        DB::beginTransaction();
        try {
            Account::where('account_no', $account_no)->update([ 'status' => 'Active',]);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return false;
        }

    }
    public function deactivateAccount($account_no)
    {
        //🖊Rule_1: Any DB Modification Must Have a Transaction;
        DB::beginTransaction();
        try {
            Account::where('account_no', $account_no)->update([ 'status' => 'Inactive',]);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return false;
        }
    }
    public function ledgerEntry($account_no, $journal, $debited_amount, $credited_amount)
    {
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
    public function generateUniqueCode()
    {
        do {
            $account_no = random_int(100000, 999999);
        } while (Account::where("account_no", "=", $account_no)->first());

        return $account_no;
    }

}