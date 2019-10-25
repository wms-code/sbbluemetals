<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id'); //->primary();
            $table->smallInteger('accounts_groups_id')->nullable();
            $table->smallInteger('accounts_category_id')->nullable();
            $table->smallInteger('accounts_report_id')->nullable();
            $table->string('name', 100)->nullable();
            $table->string('short_name', 100)->nullable();
            $table->string('contact_person', 100)->nullable();
            $table->string('address', 250)->nullable();
            $table->string('address1', 250)->nullable();
            $table->string('address2', 250)->nullable();
            $table->string('delivery_address', 250)->nullable();
            $table->string('phone', 25)->nullable();
            $table->string('mobile', 25)->nullable();
            $table->string('tngst', 25)->nullable();
            $table->string('cst', 25)->nullable();
            $table->string('gst_no', 25)->nullable();
            $table->string('vat_no', 25)->nullable();
            $table->double('opening_balance', 10, 2)->nullable();
            $table->double('closing_balance', 10, 2)->nullable();            
            $table->double('total_debits', 10, 2)->nullable();
            $table->double('total_credits', 10, 2)->nullable();
            $table->double('credit_limit', 10, 2)->nullable();            
            $table->tinyInteger('opening_balance_type')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->string('remarks', 255)->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
