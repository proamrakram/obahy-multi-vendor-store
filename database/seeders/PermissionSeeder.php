<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #########
        DB::table('permissions')->insert(
            [
                'name' => 'stores',
                'action_type' => 'بيانات المشتركين - المتاجر',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'stores-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'stores-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'stores-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'stores-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'customers',
                'action_type' => 'الزبائن',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'customer-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'customers-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'customers-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'customers-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admins-store',
                'action_type' => 'مديري المتاجر',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admins-store-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admins-store-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admins-store-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admins-store-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'sales',
                'action_type' => 'المبيعات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'sales-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'orders',
                'action_type' => 'الطلبات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'orders-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'orders-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'orders-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'orders-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'profits',
                'action_type' => 'الأرباح',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'profits-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'returns',
                'action_type' => 'المرتجعات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'returns-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'products-categories',
                'action_type' => 'تصنيفات المنتجات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'products-categories-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'products-categories-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'products-categories-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'products-categories-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'packages',
                'action_type' => 'الباقات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'packages-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'packages-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'packages-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'packages-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'products',
                'action_type' => 'المنتجات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'products-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'products-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'products-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'products-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'sales',
                'action_type' => 'المبيعات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'sales-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'reports',
                'action_type' => 'التقارير',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'reports-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'visits',
                'action_type' => 'الزيارات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'visits-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'customers',
                'action_type' => 'الزبائن',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'customers-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'customers-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'affiliates',
                'action_type' => 'المسوقيين',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'affiliates-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'affiliates-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'affiliates-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'affiliates-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'copons',
                'action_type' => 'كوبونات التخفيض',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'copons-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'copons-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'copons-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'copons-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'returns',
                'action_type' => 'المرتجعات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'returns-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'basic-settings',
                'action_type' => 'الاعدادات الأساسية',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'basic-settings-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'social-media-settings',
                'action_type' => 'روابط السوشيال ميديا',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'social-media-settings-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'faq',
                'action_type' => 'الأسئلة الشائعة',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'faq-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'about-us',
                'action_type' => 'من نحن',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'about-us-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'privacy',
                'action_type' => 'سياسة الخصوصية',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'privacy-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'default-package',
                'action_type' => 'الباقة التجريبية',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'default-package-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'package-settings',
                'action_type' => 'اعدادات الباقة',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'package-settings-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'currencies',
                'action_type' => 'العملات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'currencies-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'currencies-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'currencies-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'currencies-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'countries',
                'action_type' => 'الدول',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'countries-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'countries-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'countries-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'countries-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'cities',
                'action_type' => 'المدن',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'cities-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'cities-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'cities-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'cities-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admins',
                'action_type' => 'موظفو المنصة',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admins-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admins-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admins-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admins-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'payment-types',
                'action_type' => 'طرق الدفع',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'payment-types-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'advertisments',
                'action_type' => 'اعدادات الاعلانات والبنرات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'advertisments-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'advertisments-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'advertisments-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'advertisments-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'roles',
                'action_type' => 'الصلاحيات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'roles-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'roles-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'roles-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'roles-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-basic-settings',
                'action_type' => 'الاعدادات الأساسية',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-basic-settings-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-seo',
                'action_type' => 'تحسين محركات البحث  SEO',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-seo-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-default-currency',
                'action_type' => 'عملة المتجر',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-default-currency-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-employees',
                'action_type' => 'اعدادات الاعلانات و البنرات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-employees-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-employees-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-employees-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-employees-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-advertisment',
                'action_type' => 'اعدادات الاعلانات و البنرات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-advertisment-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-advertisment-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-advertisment-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-advertisment-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-roles',
                'action_type' => 'الصلاحيات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-roles-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-roles-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-roles-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-roles-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-copons',
                'action_type' => 'كوبونات التخفيض',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-copons-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-copons-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-copons-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-copons-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-products',
                'action_type' => 'المنتجات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-products-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-products-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-products-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-products-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-abandoned-carts',
                'action_type' => 'السلات المتروكة',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-abandoned-carts-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-abandoned-carts-settings',
                'action_type' => 'اعدادات السلات المتروكة',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-abandoned-carts-settings-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-products-comments',
                'action_type' => 'تعليقات المنتجات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-products-comments-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-products-comments-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-products-comments-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-products-comments-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-abandoned-carts',
                'action_type' => 'السلات المتروكة',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-abandoned-carts-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-products-comments',
                'action_type' => 'تعليقات المنتجات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-products-comments-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-products-comments-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-products-comments-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-products-comments-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-visits',
                'action_type' => 'الزيارات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-visits-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'stores-types',
                'action_type' => 'أنواع المتاجر',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'stores-types-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'stores-types-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'stores-types-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'stores-types-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-orders',
                'action_type' => 'الطلبات',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-orders-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-orders-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-orders-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'store-orders-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'store',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-affiliates',
                'action_type' => 'المسوقيين',
                'guard_name' => 'web',
                'parent_id' => null,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-affiliates-show',
                'action_type' => 'show',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-affiliates-create',
                'action_type' => 'create',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-affiliates-edit',
                'action_type' => 'edit',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
        DB::table('permissions')->insert(
            [
                'name' => 'admin-affiliates-delete',
                'action_type' => 'delete',
                'guard_name' => 'web',
                'parent_id' => 1,
                'type' => 'admin',
            ]
        );
    }
}
