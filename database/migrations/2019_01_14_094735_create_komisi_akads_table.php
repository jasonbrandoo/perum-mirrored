<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomisiAkadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komisi_akads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('akad_sp_id');
            $table->integer('akad_company_id');
            $table->dateTime('akad_date');
            $table->integer('akad_sales_commision');
            $table->integer('akad_spv_commision');
            $table->string('akad_coordiantor');
            $table->string('active');
            $table->dateTime('akad_ajb_date');
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
        Schema::dropIfExists('komisi_akads');
    }
}
