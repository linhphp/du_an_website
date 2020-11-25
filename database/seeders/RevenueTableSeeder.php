<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Revenue;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
class RevenueTableSeeder extends Seeder
{
    public function run()
    {
        $products = Product::all();
        foreach($products as $product){
        	DB::table('revenues')->insert(
                [
		        	'product_id' => $product->id,
		        	'import_price' => $product->price * 0.9,
		        	'export_price' => $product->price,
		        	'total_quantity' => $product->quantity,
		        	'sold_quantity' => 0,
		        	'the_remaining_quantity' => $product->quantity,
		        	'actual_revenue' => 0

                ]
        	);
        } 

    }
}
