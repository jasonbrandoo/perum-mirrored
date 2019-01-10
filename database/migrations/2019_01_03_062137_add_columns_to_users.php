<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->integer('staff_id')->after('id');
            $table->integer('role_id')->after('id');
            $table->string('phone_number')->after('name')->nullable();
            $table->string('address')->after('email')->nullable();
            $table->string('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('staff_id');
            $table->dropColumn('role_id');
            $table->dropColumn('phone_number');
            $table->dropColumn('address');
            $table->dropColumn('active');
        });
    }
}
