<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWriterBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('writer_bids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('writer_id')->nullable()->constrained('writers');
            $table->foreignId('order_id')->nullable()->constrained('orders');
            $table->mediumText('bid');
            $table->double('price')->default(0);
            $table->enum('status', ['Expired', 'Active'])->default('Active');
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
        Schema::dropIfExists('writer_bids');
    }
}