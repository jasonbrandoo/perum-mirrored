<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameSomeColumngFromBerkasTable extends Migration
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
            $table->renameColumn('berkas_giver', 'berkas_giver_id');
            $table->renameColumn('berkas_reciever', 'berkas_reciever_id');
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
        });
    }
}
