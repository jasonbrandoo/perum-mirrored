<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBerkasDatatypeFromBerkasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('berkas', function (Blueprint $table) {
            //
            $table->dropColumn('berkas_giver_id');
            $table->string('berkas_giver')->after('berkas_sp_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('berkas', function (Blueprint $table) {
            //
            $table->renameColumn('berkas_giver', 'berkas_giver_id');
        });
    }
}
