<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masstockpoint', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('stockpoint_name', 100)->unique(); 
            $table->string('rackno', 100);  
            $table->boolean('active')->default(1)->change();
            $table->timestampsTz();
             
             /**
      
     * $table->char('name', 100),$table->dateTime('created_at');$table->dateTimeTz('created_at');
     * $table->decimal('amount', 8, 2);$table->string('name', 100);
     */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascount');
    }
}
