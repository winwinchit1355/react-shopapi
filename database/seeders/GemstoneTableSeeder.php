<?php

namespace Database\Seeders;

use App\Models\Gemstone;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GemstoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gemstones=[
            [
                'uuid' => Str::uuid(),
                'name' => '(Pearl)ပုလဲ',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '(Jade)ကျောက်စိမ်း',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '(Ruby)ပတ္တမြား',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '(Diamond)စိန်',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '(Amber)ပယင်း',
            ]
            ];

            Gemstone::insert($gemstones);

    }
}
