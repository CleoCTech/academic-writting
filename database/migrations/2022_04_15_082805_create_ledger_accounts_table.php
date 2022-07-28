<?php

use App\Models\Accounting\Account;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgerAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledger_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_no');
            $table->foreign('account_no')->references('account_no')->on('accounts');
            $table->string('journal_id');
            $table->foreign('journal_id')->references('id')->on('journals');
            $table->foreignId('period_id')->constrained('fiscal_periods');
            $table->float('debited_amount')->default(0.0);
            $table->float('credited_amount')->default(0.0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ledger_accounts');
    }
}