<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveSomeColumnFromRealisasiWawancarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('realisasi_wawancaras', function (Blueprint $table) {
            //
            $table->dropColumn('rlw_analyst');
            $table->dropColumn('rlw_note');
            $table->dropColumn('rlw_sp_id');
            $table->dropColumn('rlw_kreditur_id');
            $table->dropColumn('rlw_kreditur_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('realisasi_wawancaras', function (Blueprint $table) {
            //
        });
    }
}
