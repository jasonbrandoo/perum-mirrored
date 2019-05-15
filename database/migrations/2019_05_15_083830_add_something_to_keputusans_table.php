<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomethingToKeputusansTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('keputusans', function (Blueprint $table) {
      //
      $table->integer('result_dp_plus');
      $table->dateTime('result_wawancara_date');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('keputusans', function (Blueprint $table) {
      //
      $table->dropColumn('result_dp_plus');
      $table->dateTime('result_wawancara_date');
    });
  }
}
