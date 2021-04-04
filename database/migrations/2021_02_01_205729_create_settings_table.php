<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->default(asset('assets/webSite/images/logo3.png'));
            $table->string('desc');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('fac_url')->nullable();
            $table->string('whats_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('ln_url')->nullable();
            $table->string('tw_url')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
