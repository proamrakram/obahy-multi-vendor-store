<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('website_settings')->insert([
            'default_language' => 'ar',
            'default_currency' => 1,
            'default_package' => 1,
            'package_period' => 20,
            'default_products_num' => 40,
            'default_services_num' => 30,
            'default_orders_num' => 30,
            'default_customers_num' => 40,
            'default_copons_num' => 20,
        ]);
    }
}
