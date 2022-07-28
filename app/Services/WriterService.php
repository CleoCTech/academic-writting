<?php

namespace App\Services;

use App\Models\Accounting\Account;
use App\Models\Accounting\FiscalPeriod;
use App\Models\Accounting\Journal;
use App\Models\Accounting\LedgerAccount;
use App\Models\CompanyInfomation;
use App\Models\Order;
use App\Models\OrderBilling;
use App\Models\RejectedOrder;
use App\Models\Writer;
use App\Models\WriterOrder;
use App\Services\Accounting\AccountService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WriterService {

    public function ledgerDebitEntry($writerOrder, $accountService)
    {
        //🖊Rule_1: Any DB Modification Must Have a Transaction;
        DB::beginTransaction();
        try {

            $orderBilling = OrderBilling::where('order_id', $writerOrder->order_id)->first();
            $account = $accountService->getAccount($writerOrder->writer_id, "App\Models\Writer");
            $journal = Journal::where('name', 'Recieved Payment From Company')->where('type', 'debit')->first();
            $debited_amount = $orderBilling->sale_price;
            $credited_amount = 0;
            $accountService->ledgerEntry($account->account_no, ($journal) ? $journal->id : 'NONE', $debited_amount, $credited_amount);

            $opening_balance = $accountService->getOpeningBalance($account->account_no);
            $opening_balance = $opening_balance + $debited_amount;
            $accountService->updateAccountBalance($account->account_no, $opening_balance);

            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return false;
        }

    }
    public function ledgerCreditEntry($writerOrder, $accountService)
    {
        //🖊Rule_1: Any DB Modification Must Have a Transaction;
        DB::beginTransaction();
        try {

            $orderBilling = OrderBilling::where('order_id', $writerOrder->order_id)->first();
            $account = $accountService->getAccount($writerOrder->writer_id, "App\Models\Writer");
            $journal = Journal::where('name', 'Income/Company Paying Debt')->where('type', 'credit')->first();
            $order = Order::where('order_id', $writerOrder->order_id)->first();
            $debited_amount = 0;
            $credited_amount = $orderBilling->sale_price * $order->pages;
            $accountService->ledgerEntry($account->account_no, $journal->id, $debited_amount, $credited_amount);

            $opening_balance = $accountService->getOpeningBalance($account->account_no);
            $opening_balance = $opening_balance + $credited_amount;
            $accountService->updateAccountBalance($account->account_no, $opening_balance);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return false;
        }

    }
    public function getWriter($id)
    {
        $writer = Writer::where('id', $id)->first();
        if ($writer) {
            return $writer;
        } else {
            return false;
        }
    }
    public function getTotalOrders($writer_id)
    {
        $totalOrders = WriterOrder::where('writer_id', $writer_id)
        ->where('status', 'Completed')
        ->get()->count();
        if ($totalOrders) {
            return $totalOrders;
        } else {
            return false;
        }
    }
    public function getActiveOrders($writer_id)
    {
        $totalOrders = WriterOrder::where('writer_id', $writer_id)
        ->where('status', 'Active')
        ->get()->count();
        if ($totalOrders) {
            return $totalOrders;
        } else {
            return false;
        }
    }
    public function getRevisionOrders($writer_id)
    {
        $count = RejectedOrder::whereHas('order', function (Builder $query) use ($writer_id) {
            $query->whereHas('writer_order', function (Builder $q) use ($writer_id) {
                $q->where('writer_id', $writer_id);
            });
        })->get()->count();
        if ($count) {
            return $count;
        } else {
            return false;
        }
    }
    public function getWriterModelPath()
    {
        return "App\Models\Writer";
    }
    public function getTotalEarned($writer_id, $accountService)
    {
        $model = $this->getWriterModelPath();
        $account = $accountService->getAccount($writer_id, $model);

        $Tdebited_amount = LedgerAccount::where('account_no', $account->account_no)
        ->where(function($query){
            $query->where('journal_id', 'RPFC');
        })->sum('debited_amount');

        $Tcredited_amount = LedgerAccount::where('account_no', $account->account_no)
        ->where(function($query){
            $query->where('journal_id', 'PPTC');
        })->sum('credited_amount');

        $totalEarned = $Tdebited_amount - $Tcredited_amount;
        return $totalEarned;
    }
    public function getCurrentEarned($writer_id, $accountService)
    {
        $model = $this->getWriterModelPath();
        $account = $accountService->getAccount($writer_id, $model);
        $period = FiscalPeriod::where('status', 'Current')->first();

        $Tdebited_amount = LedgerAccount::where('account_no', $account->account_no)
        ->where(function($query) use ($period){
            $query->where('journal_id', 'RPFC');
            $query->where('period_id', $period->id);
        })->sum('debited_amount');

        $Tcredited_amount = LedgerAccount::where('account_no', $account->account_no)
        ->where(function($query) use ($period){
            $query->where('journal_id', 'PPTC');
            $query->where('period_id', $period->id);
        })->sum('credited_amount');

        $totalEarned = $Tdebited_amount - $Tcredited_amount;
        return $totalEarned;
    }


}