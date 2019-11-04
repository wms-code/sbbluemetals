<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppsCountriesTablee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 

        Schema::create('apps_countries ', function (Blueprint $table) {
            $table->bigIncrements('id'); //->primary();          
            $table->string('country_code', 100)->nullable();
            $table->string('country_name', 100)->nullable();            
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
        Schema::dropIfExists('apps_countries');
    }
}
