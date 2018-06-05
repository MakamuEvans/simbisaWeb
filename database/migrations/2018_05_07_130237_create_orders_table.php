<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->integer('location_id')->unsigned();
            $table->bigInteger('delivery_latitude');
            $table->bigInteger('delivery_longitude');
            $table->boolean('status')->default(false);
            $table->timestamps();

            //create table relationship
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('location_id')->references('id')->on('vendor_locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
