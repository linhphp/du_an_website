<?php

namespace Database\Factories;

use App\Models\KindOfNews;
use App\Models\NewsCategory; 
use Illuminate\Database\Eloquent\Factories\Factory;

class KindOfNewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KindOfNews::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cate_id = NewsCategory::inRandomOrder()->first();
        return [
            'name' => $this->faker->name,
            'news_category_id' => $cate_id->id
        ];
    }
}
