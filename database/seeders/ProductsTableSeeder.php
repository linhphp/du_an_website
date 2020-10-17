<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 0; $i < 70; $i++)
        {
            Product::create(
                [
                    'brand_id' => rand(1, 6),
                    'category_id' => rand(1, 4),
                    'name' => Str::random(10),
                    'desc' => Str::random(150),
                    'content' => Str::random(200),
                    'price' => rand(100000, 900000),
                    'discount' => rand(1, 50),
                    'quantity' => rand(1,10),
                    'accessories' => Str::random(10)
                ]
            );
        }
    }
}
