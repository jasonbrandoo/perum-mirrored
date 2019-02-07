<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeSuratPesanansTableDataType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('surat_pesanans', function (Blueprint $table) {
            //
            $table->decimal('sp_price')->change();
            $table->decimal('sp_price_tl')->nullable()->change();
            $table->decimal('sp_price_list')->change();
            $table->decimal('sp_total_harga_jual')->change();
            $table->decimal('sp_harga_jual_tanah')->change();
            $table->decimal('sp_included_tl')->nullable()->change();
            $table->decimal('sp_discount')->nullable()->change();
            $table->decimal('sp_after_discount')->nullable()->change();
            $table->decimal('sp_ppn_percentage')->change();
            $table->decimal('sp_after_ppn')->change();
            $table->decimal('sp_harga_tanah_bangunan')->change();
            $table->decimal('sp_payment_method')->change();
            $table->decimal('sp_harga_jual_pengikatan')->change();
            $table->decimal('sp_kpr_plan')->change();
            $table->decimal('sp_kpr_plan_percentage')->after('sp_kpr_plan');
            // $table->decimal('sp_kpr_plan_percentage')->change();
            $table->decimal('sp_price_list')->nullable()->change();
            $table->decimal('sp_ajb_price')->change();
            $table->decimal('sp_total')->change();
            $table->decimal('sp_bill')->change();
            $table->decimal('sp_dp')->change();
            $table->decimal('sp_subsidi')->nullable()->change();
            $table->decimal('sp_tanah_lebih')->nullable()->change();
            $table->decimal('sp_harga_m2')->nullable()->change();
            $table->decimal('sp_total_harga_tanah_lebih')->nullable()->change();
            $table->decimal('sp_ppn')->change();
            $table->decimal('sp_sub_total')->change();
            $table->decimal('sp_total_bill')->change();
            $table->decimal('sp_per_month_internal')->change();
            $table->decimal('sp_internal_bill')->change();
            $table->decimal('sp_per_month_kreditur')->change();
            $table->decimal('sp_kreditur_bill')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        // Schema::dropIfExists('surat_pesanans');
    }
}
