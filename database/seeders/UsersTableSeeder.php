<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create(
            [
               'name' => 'Cao Thuc Linh',
               'email' => 'thuclinh@gmail.com',
               'password' => Hash::make(123456),
               'jurisdiction' => 2
            ]
        );
    }
}
