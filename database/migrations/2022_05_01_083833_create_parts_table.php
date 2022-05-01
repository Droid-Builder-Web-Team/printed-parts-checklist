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
        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('droids_id');
            $table->unsignedBigInteger('droid_user_pivot_id');
            $table->longText('droid_version');
            $table->longText('droid_section');
            $table->longText('sub_section')->nullable();
            $table->string('file_path');
            $table->timestamps();

            $table->foreign('droids_id')->references('id')->on('droids');
            $table->foreign('droid_user_pivot_id')->references('id')->on('droid_user_pivot');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parts');
    }
};
