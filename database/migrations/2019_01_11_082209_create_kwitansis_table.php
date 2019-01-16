<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKwitansisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kwitansis', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('kwitansi_date');
            $table->integer('kwitansi_sp_id');
            $table->string('kwitansi_faktur');
            $table->integer('kwitandi_staff_id');
            $table->string('kwitansi_staff_name');
            $table->string('kwitansi_terbilang');
            $table->string('kwitansi_for_pay');
            $table->integer('kwitansi_jumlah');
            $table->string('kwitansi_payment_method');
            $table->dateTime('kwitansi_transfer_date');
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
        Schema::dropIfExists('kwitansis');
    }
}
