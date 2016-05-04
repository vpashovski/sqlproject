<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnerCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_car', function (Blueprint $table) {
            $table->integer('owner_id')->unsigned();
            $table->integer('car_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('owner_car', function($table) {
            $table->foreign('owner_id')->references('id')->on('owners');
            $table->foreign('car_id')->references('id')->on('cars');

            $table->primary(['owner_id', 'car_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('owner_car');
    }
}
