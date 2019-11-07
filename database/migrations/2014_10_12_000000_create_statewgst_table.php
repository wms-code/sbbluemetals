<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatewgstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
       // Schema::dropIfExists('companies');
       
       

       Schema::create('accounts', function (Blueprint $table) {
        $table->bigIncrements('id');  
        $table->string('name')->unique(); 
        $table->string('phone', 100)->nullable(); 
        $table->string('email', 100)->nullable(); 
        $table->string('gst_no', 100)->nullable();            
        $table->string('address1', 100)->nullable(); 
        $table->string('address2', 100)->nullable();             
        $table->string('address3', 100)->nullable();   
        $table->integer('subgroup_code')->nullable();   
        $table->integer('stategst_code')->nullable();   
        $table->integer('group_code')->nullable();  
        $table->integer('reportgroup_code')->nullable();   
        $table->integer('opn_bal')->nullable();   
        $table->string('active','3')->nullable();  
        $table->timestamps();   
      //  $table->boolean('active')->default(0);
         
    });
    
   // Schema::table('accounts', function($table) {
      //  $table->dropColumn('stategst_code');
   // });

   // Schema::table('accounts', function($table) {       
   //     $table->integer('stategst_code')->default(0);          
    //});

        Schema::create('stategst', function (Blueprint $table) {
            $table->bigIncrements('id'); //->primary();      
            $table->string('name', 100)->nullable(); 
            $table->string('statecode', 100)->nullable();  
            $table->timestamps();
        });

        Schema::create('reportgroup', function (Blueprint $table) {
            $table->bigIncrements('id'); //->primary();      
            $table->string('name', 100)->nullable();             
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
        Schema::dropIfExists('stategst');
        Schema::dropIfExists('reportgroup');
        Schema::dropIfExists('accounts');

        Schema::table('accounts', function($table) {
            $table->dropColumn('stategst_code');
        });
    }
}
