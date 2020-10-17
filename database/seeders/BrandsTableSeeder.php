<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('brands')->insert(
            [
                [
                    'name' => 'samsung',
                    'status' => 2
                ],
                [
                    'name' => 'apple',
                    'status' => 1
                ],
                [
                    'name' => 'lenovo',
                    'status' => 2
                ],
                [
                    'name' => 'dell',
                    'status' => 1
                ],
                [
                    'name' => 'asus',
                    'status' => 2
                ],
                [
                    'name' => 'vinsmart',
                    'status' => 1
                ]
            ]
        );
    }
}
