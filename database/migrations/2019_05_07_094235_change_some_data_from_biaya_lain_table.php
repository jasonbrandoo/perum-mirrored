<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSomeDataFromBiayaLainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biaya_lain', function (Blueprint $table) {
            //
            $table->string('sp_description')->nullable()->change();
            $table->integer('sp_description_nominal')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('biaya_lain', function (Blueprint $table) {
            //
            $table->string('sp_description')->change();
            $table->integer('sp_description_nominal')->change();
        });
    }
}
