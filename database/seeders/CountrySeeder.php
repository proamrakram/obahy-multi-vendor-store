<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $models  = [
            "country_name_ar" => ["الإمارات العربية المتحدة", "مملكة البحرين", "المملكة العربية السعودية", "سلطنة عمان", "قطر", "الكويت"],
            "country_name_en" => ["The United Arab Emirates", "Bahrain", "Kingdom Saudi Arabia", "Sultanate of Oman", "Qatar", "Kuwait"],
            "country_flag" => [],
            "country_code" => ["UAE", "BH", "SA", "OM", "QA", "KW"],
        ];

        $x = 0;

        foreach ($models['country_name_ar'] as $model) {

            DB::table('countries')->insert(
                [
                    'country_name_en' => $models['country_name_en'][$x],
                    'country_name_ar' => $models['country_name_ar'][$x],
                    'country_flag' => asset('assets/images/icon-cooperation.png'),
                    'country_code' => $models['country_code'][$x],
                    'status' => "active",
                    'is_delete' => 0,
                ]
            );

            $x = $x + 1;
        }
    }
}
