<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_payments', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('bill_id')->unsigned();
            $table->foreign('bill_id')->references('id')->on('bills');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
                
            $table->integer('amount');
            $table->date('payment_made_on')->nullable();

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
        Schema::drop('bill_payments');
    }
}
