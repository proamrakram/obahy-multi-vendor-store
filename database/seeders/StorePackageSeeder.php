<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StorePackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('store_packages')->insert(
            [
                'package_name_en' => 'Gold Package',
                'package_name_ar' => 'الباقة الذهبية',
                'package_description_en' => 'Gold Package',
                'package_description_ar' => 'الباقة الذهبية',
                'package_price' => 300,
                'package_type' => 'gold',
                'package_currency' => '1',
                'package_status' => 'active',
                'is_delete' => 0
            ]
        );

        DB::table('store_packages')->insert(
            [
                'package_name_en' => 'Silver Package',
                'package_name_ar' => 'الباقة الفضية',
                'package_description_en' => 'Silver Package',
                'package_description_ar' => 'الباقة الفضية',
                'package_price' => 150,
                'package_type' => 'silver',
                'package_currency' => '1',
                'package_status' => 'active',
                'is_delete' => 0
            ]
        );

        DB::table('store_packages')->insert(
            [
                'package_name_en' => 'Free Package',
                'package_name_ar' => 'الباقة المجانية',
                'package_description_en' => 'Free Package',
                'package_description_ar' => 'الباقة المجانية',
                'package_price' => 0,
                'package_type' => 'free',
                'package_currency' => '1',
                'package_status' => 'active',
                'is_delete' => 0
            ]
        );
    }
}
