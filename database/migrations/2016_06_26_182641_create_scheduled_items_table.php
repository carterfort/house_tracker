<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduledItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scheduled_items', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->text('summary');

            $table->timestamps();
        });

        Schema::create('scheduled_item_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('scheduled_item_id')->unsigned();
            $table->foreign('scheduled_item_id')->references('id')->on('scheduled_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('scheduled_item_user');
        Schema::drop('scheduled_items');
    }
}
