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
                    'name' => 'Samsung',
                    'image' => 'Samsung42-b_25.jpg'
                ],
                [
                    'name' => 'Iphone',
                    'image' => 'iPhone-(Apple)42-b_52.jpg'
                ],
                [
                    'name' => 'Ipad',
                    'image' => 'iPad-(Apple)522-b_28.jpg'
                ],
                
                [
                    'name' => 'Lenovo',
                    'image' => 'Lenovo522-b_29.jpg'
                ],
                [
                    'name' => 'Dell',
                    'image' => 'Dell44-b_2.jpg'
                ],
                [
                    'name' => 'Asus',
                    'image' => 'asus.png'
                ],
                [
                    'name' => 'Vsmart',
                    'image' => 'Vsmart42-b_40.png'
                ],
                [
                    'name' => 'Oppo',
                    'image' => 'OPPO42-b_27.png'
                ]
            ]
        );
    }
}
