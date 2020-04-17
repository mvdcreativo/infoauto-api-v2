<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandVehicleCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_vehicle_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('vehicle_category_id');
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands')
                    ->onDelete('cascade');
            $table->foreign('vehicle_category_id')->references('id')->on('vehicle_categories')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands_vehicle_categories');
    }
}
