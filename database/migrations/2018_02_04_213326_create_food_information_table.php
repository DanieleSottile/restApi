<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mts_food_information', function (Blueprint $table) {
            $table->mediumIncrements('id');
            //Label: "VEGAN", "GLUTEN-FREE", "VEGETARIAN", DAIRY, NUTS, MEAT ORIGIN
            $table->string('label', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mts_food_information');
    }
}
