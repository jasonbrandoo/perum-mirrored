<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'role_id' => 1,
            'staff_id' => 1,
            'name' => 'admin',
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('admin1234'),
            'active' => 'Active'
        ]);
    }
}
