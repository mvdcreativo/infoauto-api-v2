<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('email', 128)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('ci')->nullable();
            $table->string('company')->nullable();
            $table->string('rut')->nullable();
            $table->string('phone')->nullable();
            $table->float('discount')->nullable();
            $table->string('role')->default('USER');
            $table->unsignedBigInteger('neighborhood_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('neighborhood_id')->references('id')->on('neighborhoods')
                    ->onDelete('cascade');

            $table->foreign('state_id')->references('id')->on('states')
                    ->onDelete('cascade');

            $table->foreign('city_id')->references('id')->on('cities')
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
        Schema::dropIfExists('users');
    }
}
