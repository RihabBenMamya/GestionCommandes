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
        Schema::create('items_orders', function (Blueprint $table) {
        $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('order_id');

            $table->foreign('item_id')
                ->references('id') // item id
                ->on('items')
                ->onDelete('cascade');

            $table->foreign('order_id')
                ->references('id') // order id
                ->on('orders')
                ->onDelete('cascade');

            $table->primary(['item_id', 'order_id'], 'items_orders_item_id_order_id_primary');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_orders');
    }
};
