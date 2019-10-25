<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKnittedFabInwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knitted_fab_inwards', function (Blueprint $table) {
            $table->string('inward_number', 20)->primary();
            $table->dateTime('inward_date')->nullable()->useCurrent();
            $table->integer('party_code')->unsigned();
            $table->string('reference', 200)->nullable();
            $table->string('remarks', 200)->nullable();
            $table->tinyInteger('stock_point_id')->nullable();
            $table->double('sub_total',4,2)->nullable();          
            $table->double('extra_amount',4,2)->nullable();          
            $table->double('tax_per',4,2)->nullable();           
            $table->double('tax_amount',4,2)->nullable();  
            $table->double('round_off',4,2)->nullable();  
            $table->double('net_value',4,2)->nullable();  
            $table->timestamps();

            /*  $table->foreign('stock_point_id')
                  ->references('id')->on('accounts')
                  ->onDelete('cascade'); */
        });

        Schema::create('knitted_fab_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('knitted_fab_inward_number', 20);
            $table->dateTime('inward_date')->nullable()->useCurrent();  
            $table->integer('indx')->unsigned();
            $table->integer('party_code')->unsigned();
            $table->tinyInteger('fabric_id')->nullable();
            $table->tinyInteger('colour_id')->nullable();
            $table->string('particulars', 200)->nullable();
            $table->double('rolls',4,2)->nullable();          
            $table->double('weight',8,3)->nullable();  
            $table->double('delivery_weight',8,3)->nullable()->default(0);    
            $table->double('rate',8,2)->nullable();      
            $table->double('amount',8,2)->nullable();  
            $table->timestamps();

               $table->foreign('knitted_fab_inward_number')
                     ->references('inward_number')->on('knitted_fab_inwards')
                     ->onDelete('cascade');
        });
    }
     

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('knitted_fab_inwards');
        Schema::dropIfExists('knitted_fab_details');
    }
}
