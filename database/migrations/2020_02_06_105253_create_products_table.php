<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('type');
            $table->string('color');
            $table->string('size');
            $table->integer('price');
            $table->integer('stock');
            $table->text('image');
            $table->text('details');
            $table->bigInteger('star');
            $table->bigInteger('visit')->default(0);
            $table->bigInteger('sell')->default(0);
            $table->bigInteger('secondcat_id')->unsigned()->index();
            $table->foreign('secondcat_id')->
            references('id')->
            on('secondcats')->
            onUpdate('cascade')->
            onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
