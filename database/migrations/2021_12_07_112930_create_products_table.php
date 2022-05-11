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
            $table->increments('id');
            $table->integer('sale_id')->references('id')->on('sales');
            // $table->foreign('sale_id')->references('id')->on('sales');
            $table->integer('category_id')->references('id')->on('categories');
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->string('images');
            $table->integer('quantity');
            $table->float('price')->default(0);
            $table->string('description');
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
