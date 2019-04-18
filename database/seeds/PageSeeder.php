<?php

use Illuminate\Database\Seeder;
use App\Model\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $page = [
            [
                'name' => 'master'
            ],
            [
                'name' => 'transaction'
            ],
            [
                'name' => 'report'
            ],
            [
                'name' => 'setting'
            ],
        ];
        Page::insert($page);
    }
}
