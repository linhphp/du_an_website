<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::upsert(
            [
                [
                    'name' => 'Laptop',
                    'image' => 'laptop.png'
                ],
                [
                    'name' => 'Tablet',
                    'image' => 'tablet.png'
                ],
                [
                    'name' => 'Mobile',
                    'image' => 'mobile.png'
                ]
            ],
            ['name', 'image']
    );
    }
}
