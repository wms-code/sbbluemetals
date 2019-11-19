<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
 
class CreateStyledetailTable extends Migration
{
     
    public function up()
    {
        Schema::create('styledetail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('styleid')->unsigned()->nullable();
            $table->integer('indx')->unsigned()->nullable();
            $table->integer('size_code')->unsigned()->nullable();
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
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('styledetail');
    }
}
