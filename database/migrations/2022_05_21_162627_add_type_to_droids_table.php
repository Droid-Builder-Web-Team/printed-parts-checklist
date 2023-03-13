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
        Schema::table('droids', function (Blueprint $table) {
            $table->unsignedBigInteger('type_id')->after('description');
            $table->string('tags')->nullable()->change();

            // Foreign Key
            $table->foreign('type_id')->references('id')->on('droid_types');
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
            $table->dropColumn('type_id');
        });
    }
};
