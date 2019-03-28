<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDataTypeFromKavlingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kavlings', function (Blueprint $table) {
            //
            $table->dateTime('kavling_start_date')->nullable()->change();
            $table->dateTime('kavling_end_date')->nullable()->change();
            $table->dateTime('kavling_shgb_date')->nullable()->change();
            $table->dateTime('kavling_imb_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kavlings', function (Blueprint $table) {
            //
            $table->dateTime('kavling_start_date');
            $table->dateTime('kavling_end_date');
            $table->dateTime('kavling_shgb_date');
            $table->dateTime('kavling_imb_date');
        });
    }
}
