<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('product_name')->nullable();
            $table->integer('cate_id');
            $table->integer('category_name');
            $table->integer('product_remove');
            $table->string('description')->nullable();
            $table->string('product_image');
            $table->string('short_description')->nullable();
            $table->string('product_slug')->unique();
            $table->integer('product_active')->default(0);
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
