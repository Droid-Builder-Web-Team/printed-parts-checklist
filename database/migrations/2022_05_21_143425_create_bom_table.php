<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('droid_bom', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('droid_id');
            $table->string('title');
            $table->string('url');
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
        Schema::dropIfExists('droid_bom');
    }
};
