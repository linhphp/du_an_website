<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        //
        User::upsert(
            [
                [
                    'name' => 'Cao Thục Linh',
                    'email' => 'thuclinh997@gmail.com',
                    'password' => Hash::make('linh1997'),
                    'jurisdiction' => 2
                ],
                [
                    'name' => 'Lê Thị Hồ Hương',
                    'email' => 'hohuong@gmail.com',
                    'password' => Hash::make('linh1997'),
                    'jurisdiction' => null
                ]
            ],
            [
               'name', 'email', 'password' , 'jurisdiction'
            ]
        );
    }
}
