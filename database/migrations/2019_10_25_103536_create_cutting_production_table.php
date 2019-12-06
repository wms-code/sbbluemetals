<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuttingproductionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cuttingproduction1', function (Blueprint $table) {
            $table->string('production_number', 20)->primary();
            $table->integer('productionnumber')->unsigned()->nullable();
            $table->dateTime('production_date')->nullable()->useCurrent();
            $table->integer('emp_code')->unsigned()->nullable();            
            $table->string('remarks', 200)->nullable();
            $table->tinyInteger('style_code')->nullable();             
            $table->double('total_pcs',4,2)->nullable();  
            $table->timestamps();
        });

        Schema::create('Cuttingproduction2', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('productionnumber', 20);
            $table->dateTime('production_date')->nullable()->useCurrent();  
            $table->integer('indx')->unsigned();
            $table->integer('emp_code')->unsigned();
            $table->integer('frnnumber')->nullable();                
            $table->tinyInteger('style_code')->nullable();        
            $table->integer('size_code')->unsigned()->nullable();
            $table->tinyInteger('fabric_code')->nullable();
            $table->tinyInteger('colour_code')->nullable();
            $table->string('size1', 10)->nullable();
            $table->string('size2', 10)->nullable();
            $table->string('size3', 10)->nullable();
            $table->string('size4', 10)->nullable();
            $table->string('size5', 10)->nullable();
            $table->string('size6', 10)->nullable();
            $table->string('size7', 10)->nullable();
            $table->string('size8', 10)->nullable();
            $table->string('size9', 10)->nullable();
            $table->string('size10', 10)->nullable();  
            $table->double('totalpcs')->nullable(); 
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
        Schema::dropIfExists('Cuttingproduction1');
        Schema::dropIfExists('Cuttingproduction2');
    }
}
