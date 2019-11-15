<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('size', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->unique();
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
            $table->boolean('active')->default(FALSE);
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
        Schema::dropIfExists('size');
    }
}
