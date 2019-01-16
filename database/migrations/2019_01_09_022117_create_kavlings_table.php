<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKavlingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kavlings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kavling_price_id');
            $table->string('kavling_type');
            $table->string('kavling_block');
            $table->string('kavling_number');
            $table->string('kavling_s_d');
            $table->string('kavling_cluster');
            $table->string('kavling_hook');
            $table->string('kavling_tl');
            $table->integer('kavling_building');
            $table->integer('kavling_surface');
            $table->string('kavling_tl_active');
            $table->string('kavling_tl_old');
            $table->integer('kavling_discount_dp');
            $table->string('kavling_sell_status');
            $table->string('kavling_market_status');
            $table->string('kavling_build_status');
            $table->dateTime('kavling_start_date');
            $table->string('kavling_progress');
            $table->dateTime('kavling_end_date');
            $table->string('kavling_shgb');
            $table->dateTime('kavling_shgb_date');
            $table->string('kavling_imb');
            $table->dateTime('kavling_imb_date');
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
        Schema::dropIfExists('kavlings');
    }
}
