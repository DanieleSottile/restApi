<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mts_categories', function (Blueprint $table) {
            $table->smallIncrements('id');
            //Label: Meat, drinks, vegetables, fish...
            $table->string('label', 50);
            $table->unsignedSmallInteger('parent_category_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mts_categories');
    }
}
