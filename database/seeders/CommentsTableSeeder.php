<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        for($i = 0; $i < 500; $i++)
        {
            $product = Product::inRandomOrder()->first();
            Comment::create(
                [
                    'user_id' => rand(1, 10),
                    'product_id' => $product->id,
                    'parent_id' => 0,
                    'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maiores ducimus quos neque laudantium, fugit, eligendi rem ipsa? Quae veniam, quis reprehenderit accusamus, laboriosam hic tenetur ad incidunt asperiores error, libero?'
                ]
            );
        }
    }
}
?>
