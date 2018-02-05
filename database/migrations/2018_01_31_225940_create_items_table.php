<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mts_items', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name', 100);
            $table->string('description', 250);
            $table->string('comment', 500);
            $table->string('barcode', 100);

            $table->index('barcode');

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
        Schema::dropIfExists('mts_items');
    }
}
