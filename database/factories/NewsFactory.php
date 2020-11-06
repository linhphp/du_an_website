<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\KindOfNews;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $kind_of_news = NewsCategory::inRandomOrder()->first();
        $new_categories = KindOfNews::inRandomOrder()->first();
        $title = $this->faker->text($maxNbChars = 50) ;
        return [
            'kind_of_news_id' => $kind_of_news->id,
            'new_categories_id' => $new_categories->id,
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'description' => $this->faker->text($maxNbChars = 200),
            'content' => $this->faker->text($maxNbChars = rand(1000,2000)),
            'post_image' => $this->faker->imageUrl($width = 640, $height = 480, 'cats', true, 'Faker')
        ];
    }
}
