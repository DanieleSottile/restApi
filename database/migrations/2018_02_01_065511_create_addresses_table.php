<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mts_addresses', function (Blueprint $table) {
            $table->unsignedMediumInteger('supplier_id');
            //Label: "Billing address", "Office", "Warehouse"
            $table->string('label', 25);
            //Street: "Rue d'Antibes", "Avenue Villermont"
            $table->string('street', 100);
            //Street Number: "2", "27b"
            $table->string('street_number', 10);

            $table->string('postal_code', 8);
            $table->string('city', 50);
            $table->string('country', 50);
            $table->string('details', 200)->nullable();

            //Defining foreign keys
            $table->foreign('supplier_id')->references('id')->on('mts_suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mts_addresses');
    }
}
