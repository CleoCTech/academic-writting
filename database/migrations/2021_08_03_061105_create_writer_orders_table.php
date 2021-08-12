<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWriterOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('writer_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('writer_id')->nullable()->constrained('writers');
            $table->foreignId('order_id')->nullable()->constrained('orders');
            $table->enum('status', ['Completed', 'Rejected', 'Revision', 'Active']);
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
        Schema::dropIfExists('writer_orders');
    }
}