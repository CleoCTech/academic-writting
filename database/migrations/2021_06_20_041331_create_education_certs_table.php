<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationCertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_certs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('writer_id')->nullable()->constrained('writers');
            $table->string('folder');
            $table->string('filename');
            $table->enum('type', ['PDF', 'Selfie']);
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
        Schema::dropIfExists('education_certs');
    }
}