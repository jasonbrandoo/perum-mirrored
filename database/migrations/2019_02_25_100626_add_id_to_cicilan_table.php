<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdToCicilanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cicilan', function (Blueprint $table) {
            //
            $table->integer('cicilan_sp_id')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cicilan', function (Blueprint $table) {
            //
            $table->dropColumn('cicilan_sp_id');
        });
    }
}
