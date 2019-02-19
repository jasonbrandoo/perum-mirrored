<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSuratpesananDataTypeFromSuratPesanansTable extends Migration
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
            $table->decimal('sp_price', 12,2)->change();
            $table->decimal('sp_price_tl', 12,2)->nullable()->change();
            $table->decimal('sp_price_list', 12,2)->change();
            $table->decimal('sp_total_harga_jual', 12,2)->change();
            $table->decimal('sp_harga_jual_tanah', 12,2)->change();
            $table->decimal('sp_included_tl', 12,2)->nullable()->change();
            $table->decimal('sp_discount', 12,2)->nullable()->change();
            $table->decimal('sp_after_discount', 12,2)->nullable()->change();
            $table->decimal('sp_ppn_percentage', 12,2)->change();
            $table->decimal('sp_after_ppn', 12,2)->change();
            $table->decimal('sp_harga_tanah_bangunan', 12,2)->change();
            $table->decimal('sp_payment_method', 12,2)->change();
            $table->decimal('sp_harga_jual_pengikatan', 12,2)->change();
            $table->decimal('sp_kpr_plan', 12,2)->change();
            $table->decimal('sp_kpr_plan_percentage', 12,2)->change();
            // $table->decimal('sp_kpr_plan_percentage', 12,2)->change();
            $table->decimal('sp_price_list', 12,2)->nullable()->change();
            $table->decimal('sp_ajb_price', 12,2)->change();
            $table->decimal('sp_total', 12,2)->change();
            $table->decimal('sp_bill', 12,2)->change();
            $table->decimal('sp_dp', 12,2)->change();
            $table->decimal('sp_tanah_lebih', 12,2)->nullable()->change();
            $table->decimal('sp_harga_m2', 12,2)->nullable()->change();
            $table->decimal('sp_total_harga_tanah_lebih', 12,2)->nullable()->change();
            $table->decimal('sp_ppn', 12,2)->change();
            $table->decimal('sp_sub_total', 12,2)->change();
            $table->decimal('sp_booking_fee', 12,2)->change();
            $table->decimal('sp_total_bill', 12,2)->change();
            $table->decimal('sp_per_month_internal', 12,2)->change();
            $table->decimal('sp_internal_bill', 12,2)->change();
            $table->decimal('sp_per_month_kreditur', 12,2)->change();
            $table->decimal('sp_kreditur_bill', 12,2)->change();
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
