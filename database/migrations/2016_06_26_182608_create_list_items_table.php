<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_items', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->text('summary');

            $table->integer('list_id')->unsigned();
            $table->foreign('list_id')->references('id')->on('lists');

            $table->dateTime('completed_at')->nullable();
            $table->integer('completed_by_id')->unsigned()->nullable();
            $table->foreign('completed_by_id')->references('id')->on('users');

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
        Schema::drop('list_items');
    }
}
