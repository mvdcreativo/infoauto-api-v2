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
            $table->bigIncrements('id');
            $table->longText('description')->nullable();
            $table->string('name_concat');
            // $table->string('url')->unique()->nullable();
            $table->float('price', 10,2)->nullable();
            $table->string('state')->default('PEN');
            $table->integer('km')->nullable()->default(0);
            $table->integer('year');
            $table->integer('visit')->nullable();
            $table->unsignedInteger('condition_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('vehicle_category_id')->nullable();
            $table->unsignedBigInteger('vehicle_model_id');
            $table->unsignedBigInteger('vehicle_sub_model_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('neighborhood_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('price_condition_id')->nullable();
            $table->unsignedBigInteger('tariff_id')->nullable(); 
            $table->unsignedBigInteger('currency_id')->nullable(); 
            $table->string('cilindrada')->nullable();
            $table->string('cv')->nullable();

            $table->timestamps();

            $table->foreign('condition_id')->references('id')->on('conditions')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('vehicle_category_id')->references('id')->on('vehicle_categories')->onDelete('cascade');
            $table->foreign('vehicle_model_id')->references('id')->on('vehicle_models')->onDelete('cascade');
            $table->foreign('vehicle_sub_model_id')->references('id')->on('vehicle_sub_models')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('neighborhood_id')->references('id')->on('neighborhoods')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('price_condition_id')->references('id')->on('price_conditions')->onDelete('cascade');
            $table->foreign('tariff_id')->references('id')->on('tariffs')->onDelete('cascade');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');

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
