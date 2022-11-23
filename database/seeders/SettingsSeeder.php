<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'key' => 'header_logo',
            'value' => '2xbNxMzQsPn4iShJA0ZBrP7AJKHj5yeP8q04VxIn.png',
        ]);
        DB::table('settings')->insert([
            'key' => 'footer_logo',
            'value' => 'IFaDY5WFa2rTErEc1NiKllTsTpjIeLx6Hp0nu1uE.png',
        ]);
    }
}
