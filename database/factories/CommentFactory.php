<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        $product = Product::inRandomOrder()->first();

        return [
            'parent_id' => $product->id,
            'user_name' => $this->faker->name,
            'content' => $this->faker->text(rand(50,100))
        ];
    }
}
