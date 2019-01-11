<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWawancarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wawancaras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('wawancara_sp_id');
            $table->integer('wawancara_kreditur_id');
            $table->integer('wawancara_price');
            $table->integer('wawancara_kpr');
            $table->string('wawancara_analyst');
            $table->string('wawancara_note')->nullable();
            $table->dateTime('wawancara_date');
            $table->string('wawancara_status');
            $table->string('wawancara_kreditur_name');
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
        Schema::dropIfExists('wawancaras');
    }
}
