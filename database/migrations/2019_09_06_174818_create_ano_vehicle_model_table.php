<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnoVehicleModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ano_vehicle_model', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ano_id');
            $table->unsignedBigInteger('vehicle_model_id');
            $table->timestamps();

            $table->foreign('ano_id')->references('id')->on('anos')->onDelete('cascade');
            $table->foreign('vehicle_model_id')->references('id')->on('vehicle_models')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ano_vehicle_model');
    }
}
