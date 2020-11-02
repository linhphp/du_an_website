<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KindOfNewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kind_of_news')->insert(
            [
                [
                    'name' => 'Bóng đá',
                    'new_categories_id' => 1
                ],
                [
                    'name' => 'Rap Việt',
                    'new_categories_id' => 4
                ],
                [
                    'name' => 'Thiên tai',
                    'new_categories_id' => 6
                ],
                [
                    'name' => 'Game',
                    'new_categories_id' => 1
                ]
            ]
        );
    }
}
