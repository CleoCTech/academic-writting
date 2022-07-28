<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCompanyInfomationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_infomations', function (Blueprint $table) {
            $table->id();
            $table->string("company_name");
            $table->string("short_name")->nullable();
            $table->date("establishment_date")->nullable();
            $table->string("history",3000)->nullable();
            $table->string("vision");
            $table->string("mission");
            $table->string("location");
            $table->string("emails");
            $table->string("phone_numbers");
            $table->string("address")->nullable();
            $table->string("logo")->nullable();
            $table->string("account_no")->nullable();
            $table->string("status")->default('Inactive');
            $table->timestamps();
        });

        DB::table('company_infomations')->insert(
            [
                [
                    'company_name' => 'Writer Craft | Essay Writing',
                    'short_name' => 'WCE',
                    'history' => 'Our journey started....',
                    'vision' => 'Default Vision Statement',
                    'mission' => 'Default Mission Statement',
                    'location' => 'Nairobi,Kenya',
                    'emails' => 'email1@comapany.com,email2@comapany.com',
                    'phone_numbers' => "071#######,072#######",
                    'address' => "xxxx-xxxx Nairobi",
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
        Schema::dropIfExists('company_infomations');
    }
}
