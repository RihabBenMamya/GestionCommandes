<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->float('Amount');
            $table->string('Description');
            $table->double('Discount');
            $table->string('Item')->unique();
            $table->string('ItemDescription');
            $table->integer('Quantity');
            $table->string('UnitCode');
            $table->string('UnitDescription');
            $table->float('UnitPrice');
            $table->float('VATAmount');
            $table->float('VATPercentage');
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
        Schema::dropIfExists('items');
    }
};
