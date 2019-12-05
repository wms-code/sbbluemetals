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

       
         //   Schema::table('knitted_fab_inwards', function($table) {
         //     $table->integer('inwardnumber')->nullable();
           //   $table->dateTime('inwarddate')->nullable();
           //   $table->double('total_weight')->nullable();
            //  });

             // Schema::table('knitted_fab_details', function($table) {
             //  $table->double('perrateamount')->nullable();
             //  $table->double('taxper')->nullable();
             //  $table->double('taxamt')->nullable();
             //  $table->double('roundoff')->nullable();
            // $table->integer('inwardnumber')->nullable();
              //  $table->string('hsn', 200)->nullable();             
             //  });
                
             //   Schema::table('knitted_fab_inwards', function($table) {
             //     $table->double('packingtaxper')->nullable();
              //    $table->double('packingtaxamount')->nullable();
             //  });

              // Schema::table('knitted_fab_inwards', function($table) {
              //    $table->double('totalpackingamount')->nullable();              
              // });
                // Schema::table('knitted_fab_inwards', function($table) {
                //  $table->double('packingamount')->nullable();              
               //});

              // Schema::table('style', function($table) {
                //  $table->double('size_code')->nullable();              
              // });
         //     $table->integer('inwardnumber')->nullable();
//table 28 nov 2:32 pm
               //Schema::table('style', function($table) {
            //      $table->integer('fabric_code1')->nullable();        
            //      $table->integer('fabric_code2')->nullable();        
            //      $table->integer('fabric_code3')->nullable();        
            //      $table->integer('fabric_code4')->nullable();        
            //      $table->integer('fabric_code5')->nullable();  
            //      $table->integer('colour_code1')->nullable();        
            //      $table->integer('colour_code2')->nullable();        
           ////       $table->integer('colour_code3')->nullable();        
            //      $table->integer('colour_code4')->nullable();        
           //       $table->integer('colour_code5')->nullable();                    
           //    });
           Schema::table('style', function($table) {
               $table->string('filename')->nullable();
               $table->string('mime')->nullable();
               $table->string('original_filename')->nullable();    
              });


        
    }
     

    
}
