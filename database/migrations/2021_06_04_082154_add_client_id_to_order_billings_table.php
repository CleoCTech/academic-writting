<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientIdToOrderBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_billings', function (Blueprint $table) {
            $table->foreignId('client_id')->after('order_id')->nullable()->constrained('clients');
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
            $table->dropColumn('client_id');
        });
    }
}
