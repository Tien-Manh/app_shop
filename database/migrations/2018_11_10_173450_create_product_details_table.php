<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('price');
            $table->integer('sell_price')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('views')->default(0);
            $table->string('brand')->nullable();
            $table->string('madein')->nullable();
            $table->string('type')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('qualitycheck')->nullable();
            $table->integer('new')->nullable();
            $table->string('color')->nullable();
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
        Schema::dropIfExists('product_details');
    }
}
