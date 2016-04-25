<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('brand');
            $table->string('model');
            $table->string('number');
            $table->integer('owner_id')->unsigned();
            $table->integer('image_id')->unsigned()->nullable();
            $table->timestamps();

//            $table->foreign('owner_id')->references('id')->on('owners')
//                ->onUpdate('cascade')->onDelete('cascade');

//            $table->foreign('image_id')->references('id')->on('images')
//                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cars');
    }
}
