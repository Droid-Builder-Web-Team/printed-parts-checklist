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
            $table->string('version')->after('name'); // MKI, MKII, MKIII etc - RH
            $table->string('tags')->after('description')->nullable(); // #oldrepublic, #clonewars, #empire, #firstorder etc = RH
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
            $table->dropColumn('version');
            $table->dropColumn('tags');
        });
    }
};
