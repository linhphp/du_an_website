<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;
class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for($i = 0; $i <1000; $i++)
        {
        	Image::create(
                [
		            'product_id' => rand(1, 10),
		            'image' => rand(1, 21).'.png'
                ]
        	);
        }

    }
}
