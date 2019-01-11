<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuratPesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_pesanans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sp_customer_id');
            $table->string('sp_company_id');
            $table->string('sp_mou_id');
            $table->string('sp_se_id');
            $table->string('sp_spv_id');
            $table->string('sp_kavling_id');
            $table->string('sp_price_id');
            //
            $table->string('sp_prebook');
            $table->string('sp_no');
            $table->dateTime('sp_date');
            $table->string('sp_ppjb');
            $table->dateTime('sp_ppjb_date');
            
            $table->string('sp_koordinator');
            
            $table->string('sp_house_type');
            $table->string('sp_house_block');
            $table->string('sp_house_no');
            $table->string('sp_house_cluster');
            $table->string('sp_house_building');
            $table->string('sp_house_surface');
            $table->string('sp_tl')->nullable();
            $table->string('sp_tt')->nullable();
            //
            $table->string('sp_price');
            $table->string('sp_price_tl')->nullable();
            $table->string('sp_price_list');
            $table->string('sp_total_harga_jual');
            $table->string('sp_harga_jual_tanah');
            $table->string('sp_included_tl')->nullable();
            $table->string('sp_discount')->nullable();
            $table->string('sp_after_discount')->nullable();
            $table->string('sp_ppn_percentage');
            $table->string('sp_after_ppn');
            $table->string('sp_harga_tanah_bangunan');
            $table->string('sp_payment_method');
            $table->string('sp_harga_jual_pengikatan');
            $table->string('sp_kpr_plan');
            $table->string('sp_ajb_price');
            $table->string('sp_total');
            //
            $table->string('sp_bill');
            $table->string('sp_dp');
            $table->string('sp_subsidi')->nullable();
            $table->string('sp_tanah_lebih')->nullable();
            $table->string('sp_harga_m2')->nullable();
            $table->string('sp_total_harga_tanah_lebih')->nullable();
            $table->string('sp_ppn');
            $table->string('sp_sub_total');
            $table->string('sp_total_bill');
            $table->string('sp_per_month_internal');
            $table->string('sp_internal_bill');
            $table->string('sp_per_month_kreditur');
            $table->string('sp_kreditur_bill');
            $table->string('active');
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
        Schema::dropIfExists('surat_pesanans');
    }
}
