<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('package_items')->insert(
            [
                'id' => 1,
                'package_item_ar' => 'عدد غير محدود من المنتجات الجاهزة',
                'package_item_en' => 'Unlimited number of ready-made products',
                'package_item_type' => 'main',
                'package_item_status' => 'active',
            ]
        );

        DB::table('package_items')->insert(
            [
                'id' => 2,
                'package_item_ar' => 'عدد غير محدود من تقديم الخدمات',
                'package_item_en' => 'Unlimited number of services provided',
                'package_item_type' => 'main',
                'package_item_status' => 'active',
            ]
        );

        DB::table('package_items')->insert(
            [
                'id' => 3,
                'package_item_ar' => 'عدد غير محدود من الطلبات',
                'package_item_en' => 'Unlimited number of orders',
                'package_item_type' => 'main',
                'package_item_status' => 'active',
            ]
        );


        DB::table('package_items')->insert(
            [
                'id' => 4,
                'package_item_ar' => 'عدد غير محدود من العملاء',
                'package_item_en' => 'Unlimited number of clients',
                'package_item_type' => 'main',
                'package_item_status' => 'active',
            ]
        );


        DB::table('package_items')->insert(
            [
                'id' => 5,
                'package_item_ar' => 'دعم فني',
                'package_item_en' => 'Technical Support',
                'package_item_type' => 'main',
                'package_item_status' => 'active',
            ]
        );


        DB::table('package_items')->insert(
            [
                'id' => 6,
                'package_item_ar' => 'خدمة عملاء',
                'package_item_en' => 'customer service',
                'package_item_type' => 'main',
                'package_item_status' => 'active',
            ]
        );


        DB::table('package_items')->insert(
            [
                'id' => 7,
                'package_item_ar' => 'تقارير',
                'package_item_en' => 'Reports',
                'package_item_type' => 'main',
                'package_item_status' => 'active',
                
            ]
        );


        DB::table('package_items')->insert(
            [
                'id' => 8,
                'package_item_ar' => 'تقييم العملاء',
                'package_item_en' => 'Customer evaluation',
                'package_item_type' => 'main',
                'package_item_status' => 'active',
            ]
        );


        DB::table('package_items')->insert(
            [
                'id' => 9,
                'package_item_ar' => 'مشاركة عمليات البيع و الاحالة داخل المنصة',
                'package_item_en' => 'Share sales and referrals within the platform',
                'package_item_type' => 'main',
                'package_item_status' => 'active',
            ]
        );


        DB::table('package_items')->insert(
            [
                'id' => 10,
                'package_item_ar' => 'محادثة مفتوحة مع العملاء عبر تشات عبية',
                'package_item_en' => 'Open chat with clients via chat',
                'package_item_type' => 'main',
                'package_item_status' => 'active',
            ]
        );

        DB::table('package_items')->insert(
            [
                'id' => 11,
                'package_item_ar' => 'محادثة مفتوحة مع التجار عبر تشات عبية',
                'package_item_en' => 'Open chat with merchants via chat',
                'package_item_type' => 'main',
                'package_item_status' => 'active',
            ]
        );


        DB::table('package_items')->insert(
            [
                'id' => 12,
                'package_item_ar' => 'الشراء بسعر الجملة',
                'package_item_en' => 'uy at wholesale price',
                'package_item_type' => 'main',
                'package_item_status' => 'active',
            ]
        );


        DB::table('package_items')->insert(
            [
                'id' => 13,
                'package_item_ar' => 'دعم ضريبة القيمة المضافة',
                'package_item_en' => 'VAT support',
                'package_item_type' => 'main',
                'package_item_status' => 'active',
            ]
        );


        DB::table('package_items')->insert(
            [
                'id' => 14,
                'package_item_ar' => 'عدد محدود من منتجات التصاميم الخاصة',
                'package_item_en' => 'Limited number of special design products',
                'package_item_type' => 'main',
                'package_item_status' => 'active',
                'count' => 1,
            ]
        );


        DB::table('package_items')->insert(
            [
                'id' => 15,
                'package_item_ar' => 'عرض ثلاثي الأبعاد في صالة عرض الأزياء',
                'package_item_en' => '3D show in the fashion showroom',
                'package_item_type' => 'main',
                'package_item_status' => 'active',
                'count' => 1,
            ]
        );


        DB::table('package_items')->insert(
            [
                'id' => 16,
                'package_item_ar' => 'تعيين فريق عمل وتحديد الصلاحيات',
                'package_item_en' => 'Appointing a working group and defining the powers',
                'package_item_type' => 'main',
                'package_item_status' => 'active',
                'count' => 1,
            ]
        );


        DB::table('package_items')->insert(
            [
                'id' => 17,
                'package_item_ar' => 'رابط لمشاركة المتجر',
                'package_item_en' => 'Link to share store',
                'package_item_type' => 'marketing_tools',
                'package_item_status' => 'active',
            ]
        );


        DB::table('package_items')->insert(
            [
                'id' => 18,
                'package_item_ar' => 'رابط لمشاركة المنتج',
                'package_item_en' => 'Link to share the product',
                'package_item_type' => 'marketing_tools',
                'package_item_status' => 'active',
            ]
        );


        DB::table('package_items')->insert(
            [
                'id' => 19,
                'package_item_ar' => 'عدد غير محدود من كوبونات التخفيض',
                'package_item_en' => 'Unlimited number of discount coupons',
                'package_item_type' => 'marketing_tools',
                'package_item_status' => 'active',
            ]
        );


        DB::table('package_items')->insert(
            [
                'id' => 20,
                'package_item_ar' => 'تسويق بالعمولة',
                'package_item_en' => 'Affiliate Marketing',
                'package_item_type' => 'marketing_tools',
                'package_item_status' => 'active',
            ]
        );


        DB::table('package_items')->insert(
            [
                'id' => 21,
                'package_item_ar' => 'اضافة حدمة الاعلان و الترويج',
                'package_item_en' => 'Add advertising and promotion',
                'package_item_type' => 'marketing_tools',
                'package_item_status' => 'active',
            ]
        );


    }
}
