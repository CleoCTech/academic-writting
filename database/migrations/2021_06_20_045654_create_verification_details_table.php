<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerificationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verification_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('verify_id')->nullable()->constrained('id_verifications');
            $table->enum('side', ['Front', 'Back', 'Selfie']);
            $table->string('folder');
            $table->string('filename');
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
        Schema::dropIfExists('verification_details');
    }
}