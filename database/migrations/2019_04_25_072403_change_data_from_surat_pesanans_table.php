<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDataFromSuratPesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_pesanans', function (Blueprint $table) {
            //
            $table->integer('sp_per_month_contractor')->nullable();
            $table->decimal('sp_contractor_bill', 12,2)->nullable();
            
            $table->integer('sp_per_month_internal')->change();
            $table->integer('sp_per_month_kreditur')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_pesanans', function (Blueprint $table) {
            //
        });
    }
}
