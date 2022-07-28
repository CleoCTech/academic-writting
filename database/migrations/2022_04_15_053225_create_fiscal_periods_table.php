<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFiscalPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiscal_periods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fiscal_year_id')->nullable()->constrained('fiscal_years');
            $table->integer('calender_month');
            $table->string('period_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });

        $currentYear = DB::table('fiscal_years')->where('status', 'Current')->first();
        $lastDay = \DateTime::createFromFormat("Y-m-d", date('Y-m-d'))->format("Y-m-t");
        $firstDay = \DateTime::createFromFormat("Y-m-d", date('Y-m-d'))->format("Y-m-d");

        DB::table('fiscal_periods')->insert(
            [
                [
                    'fiscal_year_id' => $currentYear->id,
                    'calender_month' => now()->month,
                    'period_name' => date('F',strtotime(date('Y-m-d'))). ' ' .now()->year,
                    'start_date' => $firstDay,
                    'end_date' => $lastDay,
                    'status' => 'Current',
                ]
            ]
        );

        $next_month = DB::table('fiscal_periods')->where('status', 'Pending')->first();

        if (!$next_month) {
            DB::table('fiscal_periods')->insert(
                [
                    [
                        'fiscal_year_id' => $currentYear->id,
                        'calender_month' => now()->month +1,
                        'period_name' => date('F',strtotime('first day of +1 month')). ' ' .now()->year,
                        'start_date' => date('Y-m-d',strtotime('first day of +1 month')),
                        'end_date' => date('Y-m-t',strtotime('first day of +1 month')),
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
        Schema::dropIfExists('fiscal_periods');
    }
}