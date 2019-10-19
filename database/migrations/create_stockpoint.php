<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockPointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockpoint', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->unique(); 
            $table->string('rackno', 100);  
            $table->boolean('status')->default(1)->change();
            $table->boolean('active')->default(1)->change();
            $table->timestampTz('created_at')->nullable();  
            $table->timestampTz('updated_at')->nullable();  
             
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
        Schema::dropIfExists('stockpoint');
    }
}
