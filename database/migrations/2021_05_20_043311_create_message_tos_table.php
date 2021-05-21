<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessageTosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_tos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('message_id')->nullable()->constrained('messages');
            $table->bigInteger('to_id');
            $table->string('to_type');
            $table->tinyInteger('is_read');
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
        Schema::dropIfExists('message_tos');
    }
}