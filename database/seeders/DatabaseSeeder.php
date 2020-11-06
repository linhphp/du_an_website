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
        \App\Models\NewsCategory::factory(10)->create();
        \App\Models\KindOfNews::factory(20)->create();
        \App\Models\News::factory(50)->create();
        
         $this->call([
	        BrandsTableSeeder::class,
            UsersTableSeeder::class,
	        CategoriesTableSeeder::class,
	        ProductsTableSeeder::class,
	        EmageTableSeeder::class,
            CommentsTableSeeder::class,
            StatusTableSeeder::class,
            ProvincesTableSeeder::class,
            DistrictsTableSeeder::class,
            WardsTableSeeder::class,
            // KindOfNewsTableSeeder::class,
            // NewsTableSeeder::class,
        ]);
        \App\Models\Slide::factory(2)->create();
    }
}
