<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->enum('type', ['debit', 'credit']);
            $table->timestamps();
        });

        DB::table('journals')->insert(
            [
                [
                    'id' => 'PTW',
                    'name' => 'Payment to Writer',
                    'type' => 'credit',
                ]
            ]
        );
        DB::table('journals')->insert(
            [
                [
                    'id' => 'RPFC',
                    'name' => 'Recieved Payment From Company',
                    'type' => 'debit',
                ]
            ]
        );
        DB::table('journals')->insert(
            [
                [
                    'id' => 'PPTC',
                    'name' => 'Penalty Payment to Company',
                    'type' => 'credit',
                ]
            ]
        );
        DB::table('journals')->insert(
            [
                [
                    'id' => 'PEFW',
                    'name' => 'Penalty from writer',
                    'type' => 'debit',
                ]
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journals');
    }
}