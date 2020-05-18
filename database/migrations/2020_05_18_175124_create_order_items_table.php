<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pizza_id');
            $table->integer('quantity')->default(1);
            $table->unsignedBigInteger('pizza_size_id');
            $table->unsignedBigInteger('order_id');
            $table->timestamps();

            $table->foreign('pizza_id')->references('id')->on('pizzas');
            $table->foreign('pizza_size_id')->references('id')->on('pizza_sizes');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
