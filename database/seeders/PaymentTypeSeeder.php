<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_types')->insert(
            [
                'id' => 1,
                'name_ar' => 'KNET',
                'name_en' => 'كي نت',
                'image' => 'knet.png',
            ]
        );
        DB::table('payment_types')->insert(
            [
                'id' => 2,
                'name_ar' => 'Visa',
                'name_en' => 'فيزا',
                'image' => 'visa.png',
            ]
        );
        DB::table('payment_types')->insert(
            [
                'id' => 3,
                'name_ar' => 'Master Cards',
                'name_en' => 'بطاقة ماستر',
                'image' => 'master_card.png',
            ]
        );DB::table('payment_types')->insert(
            [
                'id' => 4,
                'name_ar' => 'American Express',
                'name_en' => 'أمريكان اكسبريس',
                'image' => 'american_express.png',
            ]
        );DB::table('payment_types')->insert(
            [
                'id' => 5,
                'name_ar' => 'Mada cards',
                'name_en' => 'بطاقة مدى',
                'image' => 'mada_card.png',
            ]
        );DB::table('payment_types')->insert(
            [
                'id' => 6,
                'name_ar' => 'BENEFIT',
                'name_en' => 'بنيفت',
                'image' => 'benefit.jpg',
            ]
        );DB::table('payment_types')->insert(
            [
                'id' => 7,
                'name_ar' => 'Fawry',
                'name_en' => 'فوري',
                'image' => 'fawry.png',
            ]
        );DB::table('payment_types')->insert(
            [
                'id' => 8,
                'name_ar' => 'Oman Net',
                'name_en' => 'عمان نت',
                'image' => 'oman_net.png',
            ]
        );


    }
}
