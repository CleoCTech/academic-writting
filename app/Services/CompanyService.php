<?php

namespace App\Services;

use App\Models\Accounting\Journal;
use App\Models\CompanyInfomation;
use App\Models\Order;
use App\Models\OrderBilling;
use App\Services\Accounting\AccountService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CompanyService {

    public function ledgerCreditEntry($order_id, $accountService)
    {
        //🖊Rule_1: Any DB Modification Must Have a Transaction;
        DB::beginTransaction();
        try {

            $companyInfo = CompanyInfomation::where('status', 'Active')->first();
            $orderBilling = OrderBilling::where('order_id', $order_id)->first();
            $account = $accountService->getAccount($companyInfo->id, "App\Models\CompanyInfomation");
            $journal = Journal::where('name', 'Income/Customer Paying Debt')->where('type', 'credit')->first();
            $debited_amount = 0;
            $credited_amount = $orderBilling->total_amount;
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
    public function ledgerDebitEntry($order_id, $accountService)
    {
        //🖊Rule_1: Any DB Modification Must Have a Transaction;
        DB::beginTransaction();
        try {
            $companyInfo = CompanyInfomation::where('status', 'Active')->first();
            $account = $accountService->getAccount($companyInfo->id, "App\Models\CompanyInfomation");
            $journal = Journal::where('name', 'Purchase Writer Service')->where('type', 'debit')->first();
            $orderBilling = OrderBilling::where('order_id', $order_id)->first();
            $order = Order::where('order_id', $order_id)->first();
            $debited_amount = $orderBilling->sale_price * $order->pages;
            $credited_amount = 0;
            $accountService->ledgerEntry($account->account_no, $journal->id, $debited_amount, $credited_amount);
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
    public function getCompany()
    {
        $companyInfo = CompanyInfomation::where('status', 'Active')->first();
        if ($companyInfo) {
            return $companyInfo;
        } else {
            return false;
        }
    }
    public function getCompanyInformationModelPath()
    {
        return "App\Models\CompanyInfomation";
    }
    public function deactivateAccount($id)
    {
        //🖊Rule_1: Any DB Modification Must Have a Transaction;
        DB::beginTransaction();
        try {
            // Client::where('id', $id)->update([ 'status' => 'Inactive',]);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return false;
        }
    }

}