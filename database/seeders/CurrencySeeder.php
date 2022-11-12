<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('currencies')->insert(
            [
                'currency_name_en' => 'Dollar',
                'currency_name_ar' => 'دولار',
                'currency_symbol' => '$',
                'currency_code' => 'USD',
                'is_delete' => 0
            ]
        );

        DB::table('currencies')->insert(
            [
                'currency_name_en' => 'British Pound Sterling',
                'currency_name_ar' => 'الجنيه البريطاني الاسترليني',
                'currency_symbol' => '£',
                'currency_code' => 'GBP',
                'is_delete' => 0
            ]
        );

        DB::table('currencies')->insert(
            [
                'currency_name_en' => 'United Arab Emirates Dirham',
                'currency_name_ar' => 'الدرهم الإماراتي',
                'currency_symbol' => 'إ.د',
                'currency_code' => 'AED',
                'is_delete' => 0
            ]
        );

        DB::table('currencies')->insert(
            [
                'currency_name_en' => 'Saudi Riyal',
                'currency_name_ar' => 'الريال السعودي',
                'currency_symbol' => 'ر. س',
                'currency_code' => 'SAR',
                'is_delete' => 0
            ]
        );
    }
}
