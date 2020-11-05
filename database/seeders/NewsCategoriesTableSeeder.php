<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('news_categories')->insert(
            [

                [   
                    'name' => 'Thể thao',
                ],
                [
                    'name' => 'Âm nhạc',
                ],
                [
                    'name' => 'Chính trị',
                ],
                [
                    'name' => 'Xã hội',
                ],
                [
                    'name' => 'Y tế',
                ]   
            ]
        );   
    }
}
