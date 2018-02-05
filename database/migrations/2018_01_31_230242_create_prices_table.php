<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mts_prices', function (Blueprint $table) {
            $table->unsignedMediumInteger('item_id');
            $table->unsignedMediumInteger('supplier_id');

            $table->unsignedDecimal('price', 8, 2);
            $table->char('currency', 3);
            //tinyInteger because there won't be many units of measurement
            $table->unsignedTinyInteger('um_id');

            //Defining foreign keys
            $table->foreign('item_id')
                  ->references('id')
                  ->on('mts_items');

            $table->foreign('supplier_id')
                  ->references('id')
                  ->on('mts_suppliers');

            $table->foreign('um_id')
                  ->references('id')
                  ->on('mts_units_of_measurement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mts_prices_category');
    }
}
