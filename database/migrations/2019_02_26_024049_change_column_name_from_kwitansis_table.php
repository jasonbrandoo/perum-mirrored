<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnNameFromKwitansisTable extends Migration
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
            $table->renameColumn('kwitandi_staff_id', 'kwitansi_reciever');
            $table->renameColumn('kwitansi_payment_method', 'kwitansi_payment_method_id');
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
            // $table->renameColumn('kwitansi_reciever', 'kwitandi_staff_id')->change();
        });
    }
}
