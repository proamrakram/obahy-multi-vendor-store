<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $main_category = [
            "Men" => "رجال",
            "Women" => "نساء",
        ];

        foreach ($main_category as $key_en => $key_ar) {
            DB::table('product_categories')->insert(
                [
                    'category_name_en' => $key_en,
                    'category_name_ar' => $key_ar,
                    'parent_id' => null,
                    'category_image' => 'c' . random_int(7, 10) . '.png',
                    'category_icon' => 'c' . random_int(7, 10) . '.png',
                    'status' => 'active',
                    'is_delete' => 0
                ]
            );
        }

        $men_sub_category = [
            "Men Clothes" => "ملابس رجالية", #3
            "Men Shoes" => "أحذية رجالية", #4
            "Men's Accessories" => "اكسسوارات رجالية", #5
            "Men's Watches" => "ساعات رجالية", #6
            "Men's Perfume" => "عطور رجالية", #7
            "Men's Wallets" => "محافظ رجالية", #8
        ];

        $women_sub_category = [
            "Women Clothes" => "ملابس نسائية", #9
            "Women Shoes" => "احذية نسائية", #10
            "Women's Accessories" => "اكسسوارات نسائية", #11
            "Women's Watches" => "ساعات نسائية", #12
            "Women's Perfume" => "عطور نسائية", #13
            "Women's Wallets" => "محافظ نسائية" #14
        ];

        foreach ($men_sub_category as $key => $model) {
            DB::table('product_categories')->insert(
                [
                    'category_name_en' => $key,
                    'category_name_ar' => $model,
                    'parent_id' => 1,
                    'category_image' => 'c' . random_int(1, 6) . '.jpg',
                    'category_icon' => 'c' . random_int(7, 10) . '.png',
                    'status' => 'active',
                    'is_delete' => 0
                ]
            );
        }

        foreach ($women_sub_category as $key_en => $key_ar) {
            DB::table('product_categories')->insert(
                [
                    'category_name_en' => $key_en,
                    'category_name_ar' => $key_ar,
                    'parent_id' => 2,
                    'category_image' => 'c' . random_int(7, 10) . '.png',
                    'category_icon' => 'c' . random_int(7, 10) . '.png',
                    'status' => 'active',
                    'is_delete' => 0
                ]
            );
        }
    }
}
