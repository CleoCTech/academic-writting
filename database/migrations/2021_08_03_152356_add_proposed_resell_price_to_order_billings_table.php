<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProposedResellPriceToOrderBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_billings', function (Blueprint $table) {
            $table->double('proposed_resell_price')->default(0)->after('paid_amount');
            $table->double('sale_price')->default(0)->after('proposed_resell_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_billings', function (Blueprint $table) {
            $table->dropColumn('proposed_resell_price');
        });
    }
}