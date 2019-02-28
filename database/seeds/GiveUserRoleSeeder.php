<?php

use Illuminate\Database\Seeder;
use App\User;

class GiveUserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::where('name', 'admin')->first();
        $user->assignRole('admin');
    }
}
