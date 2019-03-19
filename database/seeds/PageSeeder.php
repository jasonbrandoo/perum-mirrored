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
                'name' => 'company'
            ],
            [
                'name' => 'customer'
            ],
            [
                'name' => 'kavling'
            ],
            [
                'name' => 'payment'
            ],
            [
                'name' => 'price'
            ],
            [
                'name' => 'referensi'
            ],
            [
                'name' => 'role'
            ],
            [
                'name' => 'rumah'
            ],
            [
                'name' => 'sales'
            ],
            [
                'name' => 'user'
            ],
            [
                'name' => 'ajb'
            ],
            [
                'name' => 'berkas'
            ],
            [
                'name' => 'akad'
            ],
            [
                'name' => 'eksternal'
            ],
            [
                'name' => 'kuitansi'
            ],
            [
                'name' => 'legalitas'
            ],
            [
                'name' => 'lpa'
            ],
            [
                'name' => 'mou'
            ],
            [
                'name' => 'pembatalan'
            ],
            [
                'name' => 'spk'
            ],
            [
                'name' => 'sp'
            ],
            [
                'name' => 'wawancara'
            ],
            [
                'name' => 'report_penjualan'
            ],
            [
                'name' => 'report_penjualan_per_sales'
            ],
            [
                'name' => 'report_pembatalan'
            ],
            [
                'name' => 'report_penerimaan'
            ],
            [
                'name' => 'report_piutang_detail'
            ],
            [
                'name' => 'report_piutang_summary'
            ],
            [
                'name' => 'report_kavling'
            ],
            [
                'rname' => 'report_status_kavling'
            ]
        ];


        Page::insert($page);
    }
}
