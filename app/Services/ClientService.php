<?php

namespace App\Services;

use App\Models\Accounting\FiscalPeriod;
use App\Models\Accounting\Journal;
use App\Models\Accounting\LedgerAccount;
use App\Models\Client;
use App\Models\OrderBilling;
use App\Services\Accounting\AccountService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClientService {

    public function activateAccount($id)
    {
        //🖊Rule_1: Any DB Modification Must Have a Transaction;
        DB::beginTransaction();
        try {
            Client::where('id', $id)->update([ 'status' => 'Active',]);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return false;
        }

    }
    public function deactivateAccount($id)
    {
        //🖊Rule_1: Any DB Modification Must Have a Transaction;
        DB::beginTransaction();
        try {
            Client::where('id', $id)->update([ 'status' => 'Inactive',]);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return false;
        }
    }
    public function getClient($id)
    {
        $client = Client::where('id', $id)->first();
        if ($client) {
            return $client;
        } else {
            return false;
        }
    }
    public function getClientModelPath()
    {
        return "App\Models\Client";
    }
    public function getTransactions($client_id, $accountService)
    {
        $period = FiscalPeriod::where('status', 'Current')->first();
        $account = $accountService->getAccount($client_id, $this->getClientModelPath());
        $transactions = LedgerAccount::where('account_no', $account->account_no)
        ->where(function ($query) use ($period) {
            $query->where('period_id', $period->id);
        })->latest()->get();
        return $transactions;
    }

    public function ledgerCreditEntry($order_id, $accountService)
    {
        //🖊Rule_1: Any DB Modification Must Have a Transaction;
        DB::beginTransaction();
        try {

            // $companyInfo = CompanyInfomation::where('status', 'Active')->first();
            // $orderBilling = OrderBilling::where('order_id', $order_id)->first();
            // $account = $accountService->getAccount($companyInfo->id, "App\Models\CompanyInfomation");
            // $journal = Journal::where('name', 'Payment to Writer')->where('type', 'credit')->first();
            // $debited_amount = 0;
            // $credited_amount = $orderBilling->sale_price;
            // $accountService->ledgerEntry($account->account_no, $journal->id, $debited_amount, $credited_amount);

            // $opening_balance = $accountService->getOpeningBalance($account->account_no);
            // $opening_balance = $opening_balance - $credited_amount;
            // $accountService->updateAccountBalance($account->account_no, $opening_balance);

            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return false;
        }

    }
    public function ledgerDebitEntry($client_id, $order_id, $accountService)
    {
        //🖊Rule_1: Any DB Modification Must Have a Transaction;
        DB::beginTransaction();
        try {
            $account = $accountService->getAccount($client_id, "App\Models\Client");
            $journal = Journal::where('name', 'Pay For Service')->where('type', 'debit')->first();
            $orderBilling = OrderBilling::where('order_id', $order_id)->first();
            $debited_amount = $orderBilling->total_amount;
            $credited_amount = 0;
            $accountService->ledgerEntry($account->account_no, $journal->id, $debited_amount, $credited_amount);
            $opening_balance = $accountService->getOpeningBalance($account->account_no);
            $opening_balance = $opening_balance - $debited_amount;
            $accountService->updateAccountBalance($account->account_no, $opening_balance);

            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return false;
        }

    }

}