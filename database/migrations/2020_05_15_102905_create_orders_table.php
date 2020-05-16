<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pizza_id');
            $table->integer('quantity')->default(1);
            $table->double('total_price_usd');
            $table->double('total_price_euro');
            $table->unsignedBigInteger('pizza_size_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('delivery_address');
            $table->string('contacts');
            $table->timestamps();

            $table->foreign('pizza_id')->references('id')->on('pizzas');
            $table->foreign('pizza_size_id')->references('id')->on('pizza_sizes');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
