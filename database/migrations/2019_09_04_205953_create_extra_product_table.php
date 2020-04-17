<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('extra_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            $table->foreign('extra_id')->references('id')->on('extras')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extra_product');
    }
}
