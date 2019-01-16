<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mous', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mou_company_id');
            $table->string('mou_coordinator');
            $table->string('mou_coordinator_position');
            $table->string('active')->nullable();
            $table->dateTime('mou_date');
            $table->dateTime('mou_start_date');
            $table->dateTime('mou_end_date');
            $table->string('mou_commision');
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
        Schema::dropIfExists('mous');
    }
}
