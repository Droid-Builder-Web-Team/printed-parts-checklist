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
        Schema::create('custom_option_list', function (Blueprint $table) {
            $table->id();
            $table->string('class');
            $table->string('version');
            $table->string('section');
            $table->string('front_image');
            $table->string('side_image_fore')->nullable->default(NULL);
            $table->string('side_image_back')->nullable->default(NULL);
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
        Schema::dropIfExists('custom_option_list');
    }
};
