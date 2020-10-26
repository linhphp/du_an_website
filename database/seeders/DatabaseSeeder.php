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
	    ]);
    }
}
