<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeNullableSomeColumnFromSuratPesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_pesanans', function (Blueprint $table) {
            //
            $table->string('sp_mou_id')->nullable()->change();
            $table->string('sp_koordinator')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_pesanans', function (Blueprint $table) {
            //
            $table->string('sp_mou_id')->change();
            $table->string('sp_koordinator')->change();
        });
    }
}
