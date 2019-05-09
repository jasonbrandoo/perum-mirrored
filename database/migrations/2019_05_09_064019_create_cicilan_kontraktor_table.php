<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCicilanKontraktorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cicilan_kontraktor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cicilan_sp_id');
            $table->integer('customer_id');
            $table->string('description');
            $table->integer('piutang');
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
        Schema::dropIfExists('cicilan_kontraktor');
    }
}
