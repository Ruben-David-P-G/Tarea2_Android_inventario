<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orders_id')->unsigned();
            $table->integer('materials_id')->unsigned();
            $table->integer('quantity')->default(1);
            $table->tinyInteger('active')->default(1);
            $table->timestamps();

            $table->foreign('orders_id')->references('id')->on('orders');
            $table->foreign('materials_id')->references('id')->on('materials');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
