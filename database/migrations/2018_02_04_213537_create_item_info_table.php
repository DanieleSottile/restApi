<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mts_item_info', function (Blueprint $table) {
            $table->integer('item_id')->unsigned();
            $table->integer('information_id')->unsigned();

            $table->foreign('item_id')->references('id')->on('mts_items');
            $table->foreign('information_id')->references('id')->on('mts_food_information');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mts_item_info');
    }
}
