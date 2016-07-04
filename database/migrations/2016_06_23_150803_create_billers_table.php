<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('summary');

            $table->boolean('auto_creates');
            $table->integer('auto_create_day')->nullable();
            $table->integer('auto_create_amount')->nullable();

            $table->string('phone_number');
            $table->string('website_url');

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
        Schema::drop('billers');
    }
}
