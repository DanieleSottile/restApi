<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mts_item_supplier', function (Blueprint $table) {
            $table->integer('item_id')->unsigned();
            $table->integer('supplier_id')->unsigned();
            //This field is true if the supplier is the default one for a certain item
            $table->boolean('default');
            //The same supplier can't be the default one for the same item
            //Primary key
            $table->primary(['item_id', 'supplier_id']);
            //Foreign keys
            $table->foreign('item_id')
                  ->references('id')->on('mts_items')
                  ->onDelete('cascade');

            $table->foreign('supplier_id')
                  ->references('id')->on('mts_suppliers')
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
        Schema::dropIfExists('mts_item_supplier');
    }
}
