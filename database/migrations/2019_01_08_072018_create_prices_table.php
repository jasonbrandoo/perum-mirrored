<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('price_house_id');
            $table->integer('price_selling');
            $table->integer('price_discount')->nullable();
            $table->integer('price_ppn');
            $table->integer('price_adm');
            $table->integer('price_netto');
            $table->integer('price_max_kpr');
            $table->integer('price_dp');
            $table->integer('price_discount_dp')->nullable();
            $table->integer('price_booking');
            $table->integer('price_surface_m2')->nullable();
            $table->integer('price_notaris')->nullable();
            $table->integer('price_5_year');
            $table->integer('price_10_year');
            $table->integer('price_15_year');
            $table->integer('price_20_year');
            $table->dateTime('price_start_date');
            $table->dateTime('price_end_date');
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
        Schema::dropIfExists('prices');
    }
}
