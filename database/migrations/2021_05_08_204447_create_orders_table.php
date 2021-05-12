<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_no')->unique();
            $table->foreignId('client_id')->nullable()->constrained('clients');
            $table->foreignId('subject_id')->nullable()->constrained('paper_categories');
            $table->string('topic');
            $table->integer('pages');
            $table->date('deadline_date');
            $table->time('deadline_time');
            $table->mediumText('instructions');
            $table->enum('status', ['In progress', 'Pending', 'Done', 'Complete', 'Rejected'])->default('Pending');
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
        Schema::dropIfExists('orders');
    }
}