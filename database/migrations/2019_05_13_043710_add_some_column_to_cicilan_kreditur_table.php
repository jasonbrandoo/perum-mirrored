<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeColumnToCicilanKrediturTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('cicilan_kreditur', function (Blueprint $table) {
      //
      $table->string('status');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('cicilan_kreditur', function (Blueprint $table) {
      //
      $table->dropColumn('status');
    });
  }
}
