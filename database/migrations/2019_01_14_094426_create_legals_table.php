<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('legal_sp_id');
            $table->dateTime('legal_date');
            $table->integer('legal_shgb_parent');
            $table->dateTime('legal_shgb_parent_date');
            $table->integer('legal_shgb_fraction');
            $table->dateTime('legal_shgb_fraction_date');
            $table->integer('legal_name');
            $table->dateTime('legal_name_date');
            $table->integer('legal_shm');
            $table->dateTime('legal_shm_date');
            $table->integer('legal_imb');
            $table->dateTime('legal_imb_date');
            $table->integer('legal_nop_pbb');
            $table->dateTime('legal_nop_pbb_date');
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
        Schema::dropIfExists('legals');
    }
}
