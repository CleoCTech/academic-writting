<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsgFrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('msg_fros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('message_id')->nullable()->constrained('msgs');
            $table->unsignedBigInteger('fromable_id');
            $table->string('fromable_type');
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
        Schema::dropIfExists('msg_fros');
    }
}
