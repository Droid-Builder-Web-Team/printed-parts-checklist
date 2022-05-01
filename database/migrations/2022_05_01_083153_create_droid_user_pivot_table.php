<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('droid_user_pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('droids_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('droids_id')->references('id')->on('droids');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('droid_user_pivot');
    }
};
