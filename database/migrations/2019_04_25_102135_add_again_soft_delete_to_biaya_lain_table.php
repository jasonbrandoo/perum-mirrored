<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAgainSoftDeleteToBiayaLainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biaya_lain', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('sp_id');
            $table->integer('no');
            $table->string('sp_description');
            $table->decimal('sp_description_nominal', 12, 2);
            $table->string('biaya_lain_status')->nullable();
            $table->string('biaya_lain_diperhitungkan')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
        });
    }
}
