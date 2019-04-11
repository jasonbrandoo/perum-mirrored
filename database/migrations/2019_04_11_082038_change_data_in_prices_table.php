<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDataInPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prices', function (Blueprint $table) {
            //
            $table->decimal('price_selling', 15,2)->change();
            $table->decimal('price_adm', 15,2)->change();
            $table->decimal('price_netto', 15,2)->change();
            $table->decimal('price_max_kpr', 15,2)->change();
            $table->decimal('price_dp', 15,2)->change();
            $table->decimal('price_booking', 15,2)->change();
            $table->decimal('price_surface_m2', 15,2)->nullable()->change();
            $table->decimal('price_notaris', 15,2)->nullable()->change();
            $table->decimal('price_5_year', 15,2)->change();
            $table->decimal('price_10_year', 15,2)->change();
            $table->decimal('price_15_year', 15,2)->change();
            $table->decimal('price_20_year', 15,2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prices', function (Blueprint $table) {
            //
        });
    }
}
