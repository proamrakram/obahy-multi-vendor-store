<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\StoreSubscription;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\StoreType;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $stores_types = [
            "Fashion designer" => "مصمم أزياء",
            "Appearance Expert" => "خبير مظهر",
            "Photographer" => "تصوير فوتوغراف",
            "Model" => "عارض أزياء",
            "Brand clothes" => "براند ملابس",
            "Trade Mark" => "علامة تجارية",
            "Leather Goods" => "مصنوعات جلدٌة",
            "Brand Hand Made" => " براند هاند ميد",
            "Sewing Workshops" => "مشاغل خياطة",
            "Clothes Factory" => "مصنع ملابس",
            "Embroidery Lab" => "معمل تطريز",
            "Fabrics && Materials" => "أقمشة وخامات",
            "Sewing Accessories" => "اكسسوارت ولوازم الخياطة",
            "Jewelry" => "مجوهرات",
            "Perfume" => "عطور",
            "Make-up 'Beauty Tools'" => "مكياج ادوات تجميل"
        ];

        $sluging = [
            1 => "Fashion designer",
            2 => "Appearance Expert",
            3 => "Photographer",
            4 => "Model",
            5 => "Brand clothes",
            6 => "Trade Mark",
            7 => "Leather Goods",
            8 => "Brand Hand Made",
            9 => "Sewing Workshops",
            10 => "Clothes Factory",
            11 => "Embroidery Lab",
            12 => "Fabrics && Materials",
            13 => "Sewing Accessories",
            14 => "Jewelry",
            15 => "Perfume",
            16 => "Make-up 'Beauty Tools'",
        ];


        foreach ($stores_types as $en_store_type => $ar_store_type) {
            DB::table('store_types')->insert([
                'store_type_ar' => $ar_store_type,
                'store_type_en' => $en_store_type,
                'slug' => Str::slug($en_store_type),
                'image' => 'st' . random_int(1, 4) . '.png',
                'banner_section' => 'active',
                'service_section' => 'active',
                'filter_section' => 'active',
                'store_type_status' => 'active',
                'is_delete' => '0'
            ]);
        }


        $stores_types = StoreType::all();
        $count = 2;
        $store_id = 1;

        while ($count <= 49) {

            $random_country_id = random_int(1, 6);

            if ($random_country_id == 1) {
                $random_city_id = random_int(1, 15);
            }

            if ($random_country_id == 2) {
                $random_city_id = random_int(16, 19);
            }

            if ($random_country_id == 3) {
                $random_city_id = random_int(20, 23);
            }

            if ($random_country_id == 4) {
                $random_city_id = random_int(24, 27);
            }

            if ($random_country_id == 5) {
                $random_city_id = random_int(28, 31);
            }

            if ($random_country_id == 6) {
                $random_city_id = random_int(32, 35);
            }

            $store_type_id = random_int(1, 16);

            DB::table('stores')->insert(
                [
                    'store_admin' => $count,
                    'store_type_id' => $store_type_id,
                    'slug' => Str::slug('Test Store ' . $count),
                    'store_type_slug' => Str::slug($sluging[$store_type_id]),
                    'store_name_ar' =>  'متجر اختبار ' . $count,
                    'store_name_en' => 'Test Store ' . $count,
                    'store_details_en' => 'Details Test' . $count,
                    'store_details_ar' => 'تفاصيل اختبار' . $count,
                    'store_address_en' => 'Address_Test_' . $count,
                    'store_address_ar' => 'عنوان اختبار ' . $count,
                    'store_logo' => 'team_member_' . random_int(2, 5) . '.png',
                    'store_domain' => asset('') . 'customer/stores/' . Str::slug($sluging[$store_type_id]) . '/details/' . Str::slug('Test Store ' . $count),
                    'phone_number' => '+9725999' . random_int(11111, 99999),
                    'email' => 'store' . $count . '@gmail.com',
                    'store_currency' => random_int(1, 4),
                    'store_country' => $random_country_id,
                    'store_city' => $random_city_id,
                    'subscription_start_date' => now(),
                    'subscription_end_date' => now()->addDays(10),
                    // 'subscription_package_id',
                    'registration_number_in_trusted' => random_int(111111111, 999999999),
                    'commercial_record' => random_int(111111111, 999999999),
                    'id_number' => random_int(111111111, 999999999),
                    'store_status' => 'active',
                    'is_trail' => '1',
                    'is_delete' => '0',
                ]
            );

            DB::table('store_subscriptions')->insert([
                'store_id' => $store_id,
                'package_id' => random_int(1, 3),
                'subscription_start_date' => now(),
                'subscription_end_date' => now(),
                'subscription_status' => 'active',
                'is_delete' => 0
            ]);

            $count = $count + 1;
            $store_id = $store_id + 1;
        }

        $stores = Store::all();

        foreach ($stores as $store) {
            $store_subscription = StoreSubscription::where('store_id', $store->id)->first();
            if ($store && $store_subscription) {
                $store->update([
                    'subscription_package_id' => $store_subscription->id
                ]);
            }
        }

        // $subscriptions = StoreSubscription::all();

        // $count = 1;
        // foreach ($subscriptions as $subscription) {
        //     $subscription->update([
        //         'store_id' => $count
        //     ]);

        //     $count = $count + 1;
        // }
    }
}
