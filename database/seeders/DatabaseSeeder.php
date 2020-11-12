<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\NewsCategory::factory(5)->create();
        \App\Models\KindOfNews::factory(5)->create();

         $this->call([
	        BrandsTableSeeder::class,
            UsersTableSeeder::class,
	        CategoriesTableSeeder::class,
	        ProductsTableSeeder::class,
	        ImageTableSeeder::class,
            NewsTableSeeder::class,
            StatusTableSeeder::class,
            ProvincesTableSeeder::class,
            DistrictsTableSeeder::class,
            WardsTableSeeder::class,
        ]);
        \App\Models\Comment::factory(500)->create();
        \App\Models\Slide::factory(2)->create();
    }
}
