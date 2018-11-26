<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baner_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('baner_image');
            $table->string('baner_title');
            $table->string('baner_content');
            $table->string('baner_content_one');
            $table->string('baner_content_two');
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
        Schema::dropIfExists('baner_details');
    }
}
