<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Emage;
class EmageTableSeeder extends Seeder
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
        	Emage::create(
                [
		            'product_id' => rand(1, 70),
		            'emagery' => rand(1, 21).'.png'
                ]
        	);
        }

    }
}
