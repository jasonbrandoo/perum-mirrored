<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDataTypeFromKwitansisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kwitansis', function (Blueprint $table) {
            //
            $table->decimal('kwitansi_jumlah', 12,2)->change();
            $table->string('kwitansi_reciever')->change();
            $table->integer('kwitansi_payment_method_id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kwitansis', function (Blueprint $table) {
            //
            $table->integer('kwitansi_jumlah')->change();
        });
    }
}
