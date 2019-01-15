<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealisasiWawancarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realisasi_wawancaras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rlw_wawancara_id');
            $table->dateTime('rlw_date');
            $table->string('rlw_analyst');
            $table->string('rlw_note');
            $table->integer('rlw_sp_id');
            $table->integer('rlw_kreditur_id');
            $table->string('rlw_kreditur_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realisasi_wawancaras');
    }
}
