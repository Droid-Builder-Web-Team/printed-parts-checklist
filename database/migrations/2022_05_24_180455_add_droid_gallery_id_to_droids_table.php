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
        Schema::table('droids', function (Blueprint $table) {
            $table->unsignedBigInteger('droid_gallery_id')->after('image')->nullable();

            $table->foreign('droid_gallery_id')->references('id')->on('droid_gallery');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('droids', function (Blueprint $table) {
            $table->dropColumn('droid_gallery_id');
        });
    }
};
