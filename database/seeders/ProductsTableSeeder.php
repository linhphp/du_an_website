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
                    'name' => 'Product ' . $i,
                    'image' => rand(2, 9).'.png',
                    'desc' => 'Coat with quilted lining and an adjustable hood. Featuring long sleeves with adjustable cuff tabs, adjustable asymmetric hem with elastic side tabs and a front zip fastening with placket.',
                    'content' => 'Nam tempus turpis at metus scelerisque placerat
                        nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo pharetras loremos.
                            Products Infomation
                        A Pocket PC is a handheld computer, which features many of the same capabilities as a modern PC. These handy little devices allow individuals to retrieve and store e-mail messages, create a contact file, coordinate appointments, surf the internet, exchange text messages and more. Every product that is labeled as a Pocket PC must be accompanied with specific software to operate the unit and must feature a touchscreen and touchpad.

                        As is the case with any new technology product, the cost of a Pocket PC was substantial during it’s early release. For approximately $700.00, consumers could purchase one of top-of-the-line Pocket PCs in 2003. These days, customers are finding that prices have become much more reasonable now that the newness is wearing off. For approximately $350.00, a new Pocket PC can now be purchased.',
                    'price' => rand(100000, 900000),
                    'discount' => rand(0, 5),
                    'quantity' => rand(1,10),
                    'accessories' => Str::random(10)
                ]
            );
        }
    }
}
