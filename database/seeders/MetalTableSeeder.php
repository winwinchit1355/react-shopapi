<?php

namespace Database\Seeders;

use App\Models\Metal;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MetalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $metals=[
            [
                'uuid' => Str::uuid(),
                'name' => '(Gold)ရွှေ',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '(Silver)ငွေ',
            ]
            ];

            Metal::insert($metals);

    }
}
