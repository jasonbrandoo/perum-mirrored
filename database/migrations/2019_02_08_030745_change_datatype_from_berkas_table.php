<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDatatypeFromBerkasTable extends Migration
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
            $table->integer('berkas_giver')->change();
            $table->integer('berkas_reciever')->change();
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
            // $table->string('berkas_reciever')->after('berkas_sp_id');
            // $table->string('berkas_giver')->after('berkas_sp_id');
        });
    }
}
