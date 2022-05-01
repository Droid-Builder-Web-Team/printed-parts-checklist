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
        Schema::create('droid_user_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('droids_id');
            $table->string('image')->nullable();
            $table->string('droid_designation')->nullable();
            $table->string('description')->nullable();
            $table->string('colour_scheme')->nullable();
            $table->string('mobility')->nullable();
            $table->string('electronics')->nullable();
            $table->string('control_system')->nullable();
            $table->string('drive_system')->nullable();
            $table->string('power')->nullable();
            $table->string('gadgets')->nullable();
            $table->longText('notes')->nullable();
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
        Schema::dropIfExists('droid_user_details');
    }
};
