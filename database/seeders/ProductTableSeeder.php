<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'uuid' => Str::uuid(),
                'name' => 'Glittering Ring (White Gold)',
                'category_id' => 1,
                'metal_id' => 1,
                'gemstone_id' => 1,
                'desc' => 'စိန်ပွင့်လေးလို တလက်လက်တောက်ပနေပြီး လက်တစ်ခါ လှုပ်ရှားလိုက်တိုင်း ပေါ်လွင်လှပစေမဲ့ စက်ဖြတ်လက်စွပ်လေးပါ။18K White Goldဖြင့်ပြုလုပ်ထားပါတယ်။',
                'quantity' => 5,
                'price' => '175000',
                'is_feature' => 'inactive',
                'feature_image' => '/products/1.jpg',
                'SKU' => '00001'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Diamond Square Cut Design Pendant(၁၃ပဲရည်)',
                'category_id' => 2,
                'metal_id' => 2,
                'gemstone_id' => 2,
                'desc' => 'အာမခံတဲ့ စိန် အရည်အသွေးမြှင့် အသန့်နီးပါးကောင်း
                G,H,I color စိန် quality တစ်မျိုးကို သာ အသုံးပြုထားသည့်အတွက် ယုံကြည်စိတ်ချစွာ ဝယ်ယူနိုင်ပါတယ်ရှင့်
                2နှစ်အတွင်း ပြန်ရောင်း (-8%) တန်ဖိုးမြင့်လဲ (0)% တန်ဖိုးနိမ့်လဲလိုပါက -(4%)
                2နှစ်နှင့်အထက် စိန်ထည်များပြန်လဲ/ရောင်းလျှင် (2)%အမြတ်
                3နှစ်နှင့်အထက် စိန်ထည်များပြန်လဲ/ရောင်းလျှင်(4)%အမြတ်
                4နှစ်နှင့် အထက်စိန်ထည်များပြန်လဲ/ရောင်းလျှင် (6)%အမြတ်
                5နှစ်နှင့် အထက်စိန်ထည်များပြန်လဲ/ရောင်းလျှင် (8)%အမြတ်
                စိန်ထည်ပစ္စည်းများ အရောင်တင် Free  (၁)ကြိမ်နှင့်
                စိန်ပြုတ်က (30စီး မှ 100စီး) အထိ Free (၁)ကြိမ် ပြန်တပ်ပေးပါမည်။
                *စိန်ထည်ဝယ်ယူသူတိုင်း အတွက် Free Delivery
                (ပို့ခ အခမဲ့)',
                'quantity' => 5,
                'price' => '4375000',
                'is_feature' => 'inactive',
                'feature_image' => '/products/2.jpg',
                'SKU' => '00002'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '24K GOLD Channel Design Pendant',
                'category_id' => 1,
                'metal_id' => 1,
                'gemstone_id' => 1,
                'desc' => '*999 3D Gold
                *အခေါက်ရွှေရည်ပြည့်  Channel ဆွဲသီး
                ပြန်ရောင်းလျှင် လက်ခ နုတ်ပြီးအခေါက်ပေါက်စျေးအတိုင်းပြန်ဝယ်ပေးပါသည်။',
                'quantity' => 5,
                'price' => '975000',
                'is_feature' => 'active',
                'feature_image' => '/products/3.jpg',
                'SKU' => '00003'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '
                18K Au750 Maung Kwin Design Ring',
                'category_id' => 3,
                'metal_id' => 1,
                'gemstone_id' => 1,
                'desc' => 'Size-14
                *White Gold
                *Made In Italy
                *Quality Guarantee
                အလဲ - 12%
                အရောင်း -17%',
                'quantity' => 5,
                'price' => '205000',
                'is_feature' => 'inactive',
                'feature_image' => '/products/4.jpg',
                'SKU' => '00005'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '18K AU 750 WHITE GOLD OVAL SHAPE DESIGN NECKLACE',
                'category_id' => 2,
                'metal_id' => 1,
                'gemstone_id' => 1,
                'desc' => "Length - 17''+1''(adjust)
                *White Gold
                *Made In Italy
                *Quality Guarantee
                အလဲ - 12%
                အရောင်း -17%",
                'quantity' => 5,
                'price' => '250000',
                'is_feature' => 'active',
                'is_feature' => 'inactive',
                'feature_image' => '/products/5.jpg',
                'SKU' => '00006'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '18K AU 750 WHITE GOLD OVAL SHAPE DESIGN NECKLACE',
                'category_id' => 2,
                'metal_id' => 1,
                'gemstone_id' => 1,
                'desc' => "Length - 17''+1''(adjust)
                *White Gold
                *Made In Italy
                *Quality Guarantee
                အလဲ - 12%
                အရောင်း -17%",
                'quantity' => 5,
                'price' => '250000',
                'is_feature' => 'active',
                'feature_image' => '/products/6.jpg',
                'SKU' => '00007'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '18K AU 750 WHITE GOLD OVAL SHAPE DESIGN NECKLACE',
                'category_id' => 2,
                'metal_id' => 1,
                'gemstone_id' => 1,
                'desc' => "Length - 17''+1''(adjust)
                *White Gold
                *Made In Italy
                *Quality Guarantee
                အလဲ - 12%
                အရောင်း -17%",
                'quantity' => 5,
                'price' => '250000',
                'is_feature' => 'inactive',
                'feature_image' => '/products/7.jpg',
                'SKU' => '00007'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '18K AU 750 WHITE GOLD OVAL SHAPE DESIGN NECKLACE',
                'category_id' => 2,
                'metal_id' => 1,
                'gemstone_id' => 1,
                'desc' => "Length - 17''+1''(adjust)
                *White Gold
                *Made In Italy
                *Quality Guarantee
                အလဲ - 12%
                အရောင်း -17%",
                'quantity' => 5,
                'price' => '250000',
                'is_feature' => 'inactive',
                'feature_image' => '/products/8.jpg',
                'SKU' => '00008'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '18K AU 750 WHITE GOLD OVAL SHAPE DESIGN NECKLACE',
                'category_id' => 2,
                'metal_id' => 1,
                'gemstone_id' => 1,
                'desc' => "Length - 17''+1''(adjust)
                *White Gold
                *Made In Italy
                *Quality Guarantee
                အလဲ - 12%
                အရောင်း -17%",
                'quantity' => 5,
                'price' => '250000',
                'is_feature' => 'inactive',
                'feature_image' => '/products/9.jpg',
                'SKU' => '00008'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '18K AU 750 WHITE GOLD OVAL SHAPE DESIGN NECKLACE',
                'category_id' => 2,
                'metal_id' => 1,
                'gemstone_id' => 1,
                'desc' => "Length - 17''+1''(adjust)
                *White Gold
                *Made In Italy
                *Quality Guarantee
                အလဲ - 12%
                အရောင်း -17%",
                'quantity' => 5,
                'price' => '250000',
                'is_feature' => 'inactive',
                'feature_image' => '/products/10.jpg',
                'SKU' => '00009'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '18K AU 750 WHITE GOLD OVAL SHAPE DESIGN NECKLACE',
                'category_id' => 2,
                'metal_id' => 1,
                'gemstone_id' => 1,
                'desc' => "Length - 17''+1''(adjust)
                *White Gold
                *Made In Italy
                *Quality Guarantee
                အလဲ - 12%
                အရောင်း -17%",
                'quantity' => 5,
                'price' => '250000',
                'is_feature' => 'inactive',
                'feature_image' => '/products/11.jpg',
                'SKU' => '000010'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => '18K AU 750 WHITE GOLD OVAL SHAPE DESIGN NECKLACE',
                'category_id' => 2,
                'metal_id' => 1,
                'gemstone_id' => 1,
                'desc' => "Length - 17''+1''(adjust)
                *White Gold
                *Made In Italy
                *Quality Guarantee
                အလဲ - 12%
                အရောင်း -17%",
                'quantity' => 5,
                'price' => '250000',
                'is_feature' => 'inactive',
                'feature_image' => '/products/12.jpg',
                'SKU' => '000011'
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
