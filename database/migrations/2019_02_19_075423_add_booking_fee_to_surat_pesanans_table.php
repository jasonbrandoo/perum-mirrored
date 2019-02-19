<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBookingFeeToSuratPesanansTable extends Migration
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
            $table->decimal('sp_booking_fee')->after('sp_sub_total');
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
            $table->dropColumn('sp_booking_fee');
        });
    }
}
