<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembatalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembatalans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cancel_sp_id');
            $table->dateTime('cancel_date');
            $table->string('cancel_group');
            $table->string('cancel_reason');
            $table->string('cancel_refund')->nullable();
            $table->string('cancel_tambahan')->nullable();
            $table->string('cancel_status');
            $table->integer('cancel_consumen_bill');
            $table->integer('cancel_total_bill');
            $table->string('cancel_make_by');
            $table->string('cancel_approve_by');
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
        Schema::dropIfExists('pembatalans');
    }
}
