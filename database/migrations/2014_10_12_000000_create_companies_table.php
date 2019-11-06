<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 

        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id'); //->primary();      
            $table->string('name', 100)->nullable(); 
            $table->string('mobile', 100)->nullable(); 
            $table->string('compmail', 100)->nullable(); 
            $table->string('gstno', 100)->nullable();            
            $table->string('address1', 100)->nullable(); 
            $table->string('address2', 100)->nullable(); 
            $table->string('address3', 100)->nullable();              
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('companies');
    }
}
