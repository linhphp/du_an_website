<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;
class StatusTableSeeder extends Seeder
{
    public function run()
    {
        Status::upsert(
            [
            	[
                    'name' => 'pending'
                ],
                [
                    'name' => 'cancel'
                ],
                [
                    'name' => 'processing'
                ],
                [
                    'name' => 'delivery'
                ],
                [
                    'name' => 'has taken the goods'
                ],
                [
                    'name' => 'Delivered'
                ]
            ],
            ['name']
        );
    }
}
