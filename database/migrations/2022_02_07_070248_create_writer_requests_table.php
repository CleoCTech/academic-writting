<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWriterRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('writer_requests', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('writer_id')->nullable()->constrained('writers');
            $table->foreignId('client_id')->nullable()->constrained('clients');
            $table->foreignId('order_id')->nullable()->constrained('orders');
            $table->enum('status', ['Approved', 'Pending', 'Declined'])->default('Pending');
            $table->time('time_limit')->nullable();
            $table->boolean('is_read')->default(0);
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
        Schema::dropIfExists('writer_requests');
    }
}
