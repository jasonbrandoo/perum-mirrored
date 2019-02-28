<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Permission;

class GiveUserPermissionSeeder extends Seeder
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
        $user->givePermissionTo(Permission::all());
    }
}
