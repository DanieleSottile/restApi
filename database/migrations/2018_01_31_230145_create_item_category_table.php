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
            $table->unsignedMediumInteger('item_id');
            $table->unsignedSmallInteger('category_id');

            //Primary Key
            $table->primary(['item_id', 'category_id']);

            //Foreign keys
            $table->foreign('item_id')
                  ->references('id')->on('mts_items')
                  ->onDelete('cascade');

            $table->foreign('category_id')
                  ->references('id')->on('mts_categories')
                  ->onDelete('cascade');
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
