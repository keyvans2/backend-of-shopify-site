<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_product', function (Blueprint $table) {
            $table->bigInteger('cart_id')->unsigned()->index();
            $table->bigInteger('product_id')->unsigned()->index();

            $table->foreign('cart_id')->
            references('id')->
            on('carts')->
            onDelete('cascade')->
            onUpdate('cascade');

            $table->foreign('product_id')->
            references('id')->
            on('products')->
            onDelete('cascade')->
            onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_product');
    }
}
