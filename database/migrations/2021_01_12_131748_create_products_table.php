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
            $table->string('name');
            $table->text('description');
            $table->integer('subCategory_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->double('purchase_price','8','2');
            $table->double('sale_price','8','2');
            $table->double('discount','8','2');
            $table->integer('stock');
            $table->tinyInteger('status')->nullable()->default(0);
            $table->tinyInteger('hot_new')->nullable()->default(0);
            $table->tinyInteger('best_rated')->nullable()->default(0);
            $table->tinyInteger('trend_product')->nullable()->default(0);
            $table->tinyInteger('slider_discount')->nullable()->default(0);
            $table->timestamps();
            $table->foreign('subCategory_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

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
