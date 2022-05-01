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
        Schema::create('droid_instructions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('droid_id');
            $table->string('title');
            $table->string('url');

            $table->foreign('droid_id')->references('id')->on('droids');
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
        Schema::dropIfExists('droid_instructions');
    }
};
