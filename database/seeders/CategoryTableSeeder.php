<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories=[
            [
                'uuid' => Str::uuid(),
                'name' => '(Ring)လက်စွပ်',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '(Necklace)ဆွဲကြိုး',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '(Earring)နားကပ်',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '(Bracelet)လက်ကောက်',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '(Pendant)ဆွဲသီး',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '(Brooche)ရင်ထိုး',
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '(Anklet)ခြေကျင်း',
            ],
            ];

            Category::insert($categories);
    }
}
