<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_categories', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('name');
            $table->string('type');

            $table->timestamps();
        });

        Schema::create('list_category_list', function(Blueprint $table){
            $table->integer('list_category_id')->unsigned();
            $table->foreign('list_category_id')->references('id')->on('list_categories');

            $table->integer('list_id')->unsigned();
            $table->foreign('list_id')->references('id')->on('lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('list_category_list');
        Schema::drop('list_categories');
    }
}
