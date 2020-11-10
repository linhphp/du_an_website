<?php

namespace Database\Factories;

use App\Models\Slide;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class SlideFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slide::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $product = Product::inRandomOrder()->first();

        return [
            'sub_title' => $this->faker->name,
            'title' => $this->faker->name,
            'desc' => $this->faker->text($maxNbChars = 150),
            'link' => 1,
            'image' => $this->faker->imageUrl($width = 1920, $height = 800),
        ];
    }
}
