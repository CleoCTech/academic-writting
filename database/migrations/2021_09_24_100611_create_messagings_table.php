<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messagings', function (Blueprint $table) {
            $table->id();
            $table->mediumText('message');
            $table->unsignedBigInteger('fromable_id')->nullable();
            $table->unsignedBigInteger('toable_id')->nullable();
            $table->string('fromable_type')->nullable();
            $table->string('toable_type')->nullable();
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
        Schema::dropIfExists('messagings');
    }
}