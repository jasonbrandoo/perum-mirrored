<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSubsidiDataTypeFromSuratPesanansTable extends Migration
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
            $table->string('sp_subsidi')->change();
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
            $table->dropColumn('sp_subsidi');
        });
    }
}
