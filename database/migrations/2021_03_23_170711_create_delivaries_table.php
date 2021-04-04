<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelivariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('address');
            $table->string('city');
            $table->string('country')->default('Egypt');
            $table->string('state');
            $table->string('name');
            $table->string('phone');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');





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
        Schema::dropIfExists('delivaries');
    }
}
