<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDataToKavlingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kavlings', function (Blueprint $table) {
            //
            $table->string('kavling_ukuran')->after('kavling_cluster');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kavlings', function (Blueprint $table) {
            //
            $table->dropColumn('kavling_ukuran');
        });
    }
}
