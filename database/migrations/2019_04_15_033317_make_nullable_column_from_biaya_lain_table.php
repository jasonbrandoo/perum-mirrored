<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeNullableColumnFromBiayaLainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biaya_lain', function (Blueprint $table) {
            //
            $table->integer('sp_id')->nullable()->change();
            $table->string('sp_description')->nullable()->change();
            $table->decimal('sp_description_nominal', 12,2)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('biaya_lain', function (Blueprint $table) {
            //
            $table->integer('sp_id')->change();
            $table->string('sp_description')->change();
            $table->decimal('sp_description_nominal', 12,2)->change();
        });
    }
}
