<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAjbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ajbs', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('ajb_date');
            $table->integer('ajb_price_1');
            $table->integer('ajb_price_2');
            $table->integer('ajb_lt');
            $table->integer('ajb_tl');
            $table->string('ajb_notaris');
            $table->string('ajb_description')->nullable();
            $table->integer('ajb_sp_id');
            $table->integer('ajb_shgb');
            $table->dateTime('ajb_shgb_date');
            $table->integer('ajb_imb');
            $table->dateTime('ajb_imb_date');
            $table->integer('ajb_sp3k');
            $table->dateTime('ajb_sp3k_date');
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
        Schema::dropIfExists('ajbs');
    }
}
