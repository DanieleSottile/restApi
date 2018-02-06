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
            $table->unsignedTinyInteger('um_id')->nullable();
            $table->dateTime('valid_from');
            $table->dateTime('valid_to')->nullable();
            $table->boolean('active')->default('false');

            //Defining foreign keys

            /**
            * If an item_id is updated we'll update its reference.
            * If an item record is deleted, we'll delete all prices linked to it.
            */

            $table->foreign('item_id')
                  ->references('id')
                  ->on('mts_items')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            /**
            * If a supplier_id is updated we'll update its reference.
            * If a supplier record is deleted, we still want to keep a trace of
            * the price changes for a certain item so we'll block the action in
            * case an item has still a price linked to the supplier.
            */
            $table->foreign('supplier_id')
                  ->references('id')
                  ->on('mts_suppliers')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');

            $table->foreign('um_id')
                  ->references('id')
                  ->on('mts_units_of_measurement')
                  ->onUpdate('cascade')
                  ->onDelete('set null');
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
