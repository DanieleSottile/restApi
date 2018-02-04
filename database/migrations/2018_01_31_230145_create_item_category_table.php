<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mts_item_category', function (Blueprint $table) {
            $table->integer('item_id')->unsigned();
            $table->integer('category_id')->unsigned();
            
            //Defining foreign keys
            $table->foreign('item_id')->references('id')->on('mts_items');
            $table->foreign('category_id')->references('id')->on('mts_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mts_item_category');
    }
}
