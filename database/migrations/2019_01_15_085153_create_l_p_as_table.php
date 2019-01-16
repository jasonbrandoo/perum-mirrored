<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLPAsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('l_p_as', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('lpa_date');
            $table->string('lpa_type');
            $table->integer('lpa_kavling_id');
            $table->integer('lpa_sp_id');
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
        Schema::dropIfExists('l_p_as');
    }
}
