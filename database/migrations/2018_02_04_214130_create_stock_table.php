<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mts_stock', function (Blueprint $table) {
            $table->unsignedMediumInteger('item_id');
            //we could have a batch running each night and calculating all "transactions"
            //let's say we have an original stock of flour T65 of 10kg. during the day, for each use i add a row in a table like ITEM_ID=5, quantity = 5kg
            //i could calculate the remaining stock checking all rows in that table or, if i can wait for the day after, i can wait for the script to run and save the result in the stock table
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
        Schema::dropIfExists('mts_stock');
    }
}
