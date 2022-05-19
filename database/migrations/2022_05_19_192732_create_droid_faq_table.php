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
        Schema::create('droid_faq', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('droid_id');
            $table->string('title');
            $table->longText('content');
            $table->timestamps();

            $table->foreign('droid_id')->references('id')->on('droids');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('droid_faq');
    }
};
