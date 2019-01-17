<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeputusansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keputusans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('result_realization_id');
            $table->string('result_status');
            $table->string('result_banding');
            $table->string('result_reason')->nullable();
            $table->dateTime('result_date');
            $table->dateTime('result_expired_date');
            $table->integer('result_sp_id');
            $table->integer('result_kpr_approve');
            $table->integer('result_waktu_bunga');
            $table->integer('result_angsuran_bulan');
            $table->integer('result_account');
            $table->integer('result_angsuran_first_month');
            $table->integer('result_provisi');
            $table->integer('result_bi_notaris');
            $table->integer('result_bi_apht');
            $table->integer('result_appraiser');
            $table->integer('result_premi_kebakaran');
            $table->integer('result_premi_jiwa');
            $table->integer('result_tabungan_diblokir');
            $table->integer('result_bi_administrasi');
            $table->integer('result_sub_total');
            $table->integer('result_grand_total');
            $table->string('result_note');
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
        Schema::dropIfExists('keputusans');
    }
}
