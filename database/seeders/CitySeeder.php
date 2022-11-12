<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $uma_names = [
            "دبي" => "Dubai",
            "أبو ظبي" => "Abu Dhabi",
            "الشارقة" => "Sharjah",
            "العين" => "Al Ain",
            "عجمان" => "Ajman",
            "رأس الخيمة" => "Ras Al Khaimah",
            "الفجيرة" => "Fujairah",
            "ام القيوين" => "Umm al-Quwain",
            "دبا الفجيرة" => "Dibba Al-Fujairah",
            "خورفكان" => "Khor Fakkan",
            "كلباء" => "Kalba",
            "جبل علي" => "Jebel Ali",
            "مدينة زايد" => "Madinat Zayed",
            "الرويس" => "Ruwais",
            "ليوا" => "Liwa Oasis",
        ];

        $bahrain_names = [
            "المنامة" => "Manama",
            "المحرق" => "Muharraq",
            "سترة" => "Sitra",
            "الرفاع" => "Riffa",
        ];


        $saudi_arabia_names = [
            "الرياض" => "Riyadh",
            "جدة" => "Jeddah",
            "مكة المكرمة" => "Mecca",
            "المدينة المنورة" => "Medina",
        ];

        $sultanate_of_oman = [
            "محافظة مسقط" => "maska",
            "محافظة ظفار" => "Dhofar",
            "محافظة مسندم" => "Musandam",
            "محافظة البريمي" => "Al Buraimi",
        ];

        $qatar = [
            "الدوحة" => "Doha",
            "الثقب" => "Al Holeq ",
            "الجميلية" => "Al Jamiliya",
            "الخريب" => "Al-Khurayb",
        ];

        $kuwait = [
            "العاصمة" => "Capital",
            "الأحمدي" => "Ahmadi",
            "الفروانية" => "Farwaniya",
            "الجهراء" => "Jahra",
        ];

        foreach ($uma_names as $ar_num_name => $en_un_name) {
            DB::table('cities')->insert(
                [
                    "city_name_en" => $en_un_name,
                    "city_name_ar" => $ar_num_name,
                    "country_id" => 1,
                    "status" => "active",
                    'is_delete' => 0,
                ]
            );
        }

        foreach ($bahrain_names as $ar_bahrain_name => $en_bahrain_name) {
            DB::table('cities')->insert(
                [
                    "city_name_en" => $en_bahrain_name,
                    "city_name_ar" => $ar_bahrain_name,
                    "country_id" => 2,
                    "status" => "active",
                    'is_delete' => 0,
                ]
            );
        }

        foreach ($uma_names as $ar_saudi_arabia_name => $en_saudi_arabia_name) {
            DB::table('cities')->insert(
                [
                    "city_name_en" => $en_saudi_arabia_name,
                    "city_name_ar" => $ar_saudi_arabia_name,
                    "country_id" => 3,
                    "status" => "active",
                    'is_delete' => 0,
                ]
            );
        }

        foreach ($sultanate_of_oman as $ar_sultanate_of_oman => $en_sultanate_of_oman) {
            DB::table('cities')->insert(
                [
                    "city_name_en" => $en_sultanate_of_oman,
                    "city_name_ar" => $ar_sultanate_of_oman,
                    "country_id" => 4,
                    "status" => "active",
                    'is_delete' => 0,
                ]
            );
        }

        foreach ($qatar as $ar_qatar => $en_qatar) {
            DB::table('cities')->insert(
                [
                    "city_name_en" => $en_qatar,
                    "city_name_ar" => $ar_qatar,
                    "country_id" => 5,
                    "status" => "active",
                    'is_delete' => 0,
                ]
            );
        }

        foreach ($kuwait as $ar_kuwait => $en_kuwait) {
            DB::table('cities')->insert(
                [
                    "city_name_en" => $en_kuwait,
                    "city_name_ar" => $ar_kuwait,
                    "country_id" => 6,
                    "status" => "active",
                    'is_delete' => 0,
                ]
            );
        }
    }
}
