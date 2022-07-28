<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFiscalYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiscal_years', function (Blueprint $table) {
            $table->id();
            $table->string('year_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });

        DB::table('fiscal_years')->insert(
            [
                [
                    'year_name' => now()->year,
                    'start_date' => (new \DateTime(date("Y")."-01-01"))->format("Y-m-d"),
                    'end_date' => (new \DateTime(date("Y")."-12-31"))->format("Y-m-d"),
                    'status' => 'Current',
                ]
            ]
        );

        $next_year = DB::table('fiscal_years')->where('status', 'Pending')->first();
        if (!$next_year) {

            $start_date = new DateTime(date("Y")."-01-01");
            $start_date->add(new DateInterval('P7Y'));
            $start_date->format('Y-m-d');
            $end_date = new DateTime(date("Y")."-12-31");
            $end_date->add(new DateInterval('P7Y'));
            $end_date->format('Y-m-d');

            DB::table('fiscal_years')->insert(
                [
                    [
                        'year_name' => now()->year + 1,
                        'start_date' => $start_date,
                        'end_date' => $end_date,
                        'status' => 'Pending',
                    ]
                ]
            );
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fiscal_years');
    }
}
