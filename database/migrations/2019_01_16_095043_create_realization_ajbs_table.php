<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealizationAjbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realization_ajbs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('realization_ajb_id');
            $table->integer('realization_max_kpr');
            $table->integer('realization_money_hold');
            $table->integer('realization_imb');
            $table->integer('realization_stf');
            $table->integer('realization_listrik');
            $table->integer('realization_bestek');
            $table->integer('realization_prjb');
            $table->integer('realization_prbj_2');
            $table->integer('realization_stf_1');
            $table->dateTime('realization_stf_date_1');
            $table->integer('realization_stf_2');
            $table->dateTime('realization_stf_2_date');
            $table->integer('realization_kredit');
            $table->integer('realization_application');
            $table->integer('realization_npwp');
            $table->integer('realization_nop');
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
        Schema::dropIfExists('realization_ajbs');
    }
}
