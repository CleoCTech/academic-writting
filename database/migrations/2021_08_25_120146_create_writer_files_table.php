<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWriterFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('writer_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('writer_id')->nullable()->constrained('writers');
            $table->foreignId('order_id')->nullable()->constrained('orders');
            $table->string('folder');
            $table->string('filename');
            $table->enum('status', ['Accepted', 'Declined', 'Pending'])->default('Pending');
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
        Schema::dropIfExists('writer_files');
    }
}
