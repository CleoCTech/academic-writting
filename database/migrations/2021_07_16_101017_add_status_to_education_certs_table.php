<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToEducationCertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('education_certs', function (Blueprint $table) {
            $table->enum('status', ['unverified', 'verified'])->after('type')->nullable()->default('unverified');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('education_certs', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
