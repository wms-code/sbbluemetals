<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

       // Schema::table('fabrics', function($table) {
       // $table->integer('fabricgroup_code')->nullable();
      //  });

       
            Schema::table('knitted_fab_inwards', function($table) {
              $table->integer('inwardnumber')->nullable();
              $table->dateTime('inwarddate')->nullable();
              $table->double('total_weight')->nullable();
              });

              Schema::table('knitted_fab_details', function($table) {
               $table->double('perrateamount')->nullable();
               $table->double('taxper')->nullable();
               $table->double('taxamt')->nullable();
               $table->double('roundoff')->nullable();
               });

        
    }
     

    
}
