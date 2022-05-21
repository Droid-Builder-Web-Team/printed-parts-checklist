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
        Schema::create('droid_gallery', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('droids_id');
            $table->string('url');
            $table->timestamps();

            $table->foreign('droids_id')->references('id')->on('droids');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('droid_gallery');
    }
};
