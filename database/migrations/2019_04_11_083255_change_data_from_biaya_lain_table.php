<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDataFromBiayaLainTable extends Migration
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
            $table->string('biaya_lain_status')->nullable();
            $table->string('biaya_lain_diperhitungkan')->nullable();
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
            $table->dropColumn('biaya_lain_status');
            $table->dropColumn('biaya_lain_diperhitungkan');
        });
    }
}
