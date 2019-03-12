<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDatatypeFromAjbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ajbs', function (Blueprint $table) {
            //
            $table->decimal('ajb_price_1', 12,2)->change();
            $table->decimal('ajb_price_2', 12,2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ajbs', function (Blueprint $table) {
            //
            $table->integer('ajb_price_1', 12,2)->change();
            $table->integer('ajb_price_2', 12,2)->change();
        });
    }
}
