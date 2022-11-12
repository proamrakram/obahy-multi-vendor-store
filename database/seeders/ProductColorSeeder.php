<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            "Red" => ["#FF0000	", "أحمر"],
            "Green" => ["#008000", "اخضر"],
            "Blue" => ["#0000FF", "أرزق"],
            "Black" => ["#000000", "أسود"],
            "Yellow" => ["#FFFF00", "أصفر"],
            "Silver" => ["#C0C0C0", "فضي"],
            "Gray" => ["#808080", "رمادي"],
            "White" => ["#FFFFFF", "أبيض"],
            "Purple" => ["#800080", "بنفسجي"]
        ];

        $x = 1;

        foreach ($colors as $key => $value) {
            DB::table('product_colors')->insert([
                'id' => $x,
                'color_name_ar' => $value[1],
                'color_name_en' => $key,
                'color_code' => $value[0],
                'status' => "active",
                'is_delete' => 0,
            ]);
            $x = $x + 1;
        }
    }
}
