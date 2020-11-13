<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Product;
use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        $product = Product::inRandomOrder()->first();
        $news = News::inRandomOrder()->first();
            $paren = rand($product->id, $news->id);
            $state =0;
            if($paren == $news->id){
                $state = rand(1,2);
            }
            else {
                $state = 1;
            }

        return [
            'parent_id' => rand($product->id, $news->id),
            'user_name' => $this->faker->name,
            'state' => $state,
            'content' => $this->faker->text(rand(50,100))
        ];
    }
}
