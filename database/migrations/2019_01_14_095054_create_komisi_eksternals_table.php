<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomisiEksternalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komisi_eksternals', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('eksternal_date');
            $table->integer('eksternal_coordinator');
            $table->integer('eksternal_commision');
            $table->integer(('eksternal_company_id'));
            $table->integer('eksternal_mou_id');
            $table->integer('eksternal_sp_id');
            $table->dateTime('eksternal_ajb_date');
            $table->string('active')->nullable();
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
        Schema::dropIfExists('komisi_eksternals');
    }
}
