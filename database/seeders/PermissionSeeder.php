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
        DB::table('permissions')->insert(
            [
            'name' => 'بيانات المشتركين - المتاجر',
            'guard_name' => 'web', 
            'parent_id' => null,
            ]);
            DB::table('permissions')->insert([
            'name' => 'رؤية - المتاجر',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'اضافة - المتاجر',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'تعديل - المتاجر',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'حذف - المتاجر',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'المبيعات',
            'guard_name' => 'web', 
            'parent_id' => null,
        ]);
        DB::table('permissions')->insert([
            'name' => 'رؤية - المبيعات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'اضافة - المبيعات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'تعديل - المبيعات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'حذف - المبيعات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'الزيارات',
            'guard_name' => 'web', 
            'parent_id' => null,
        ]);
        DB::table('permissions')->insert([
            'name' => 'رؤية - الزيارات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'اضافة - الزيارات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'تعديل - الزيارات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'حذف - الزيارات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'الطلبات',
            'guard_name' => 'web', 
            'parent_id' => null,
        ]);
        DB::table('permissions')->insert([
            'name' => 'رؤية - الطلبات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'اضافة - الطلبات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'تعديل - الطلبات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'حذف - الطلبات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'الأرباح',
            'guard_name' => 'web', 
            'parent_id' => null,
        ]);
        DB::table('permissions')->insert([
            'name' => 'رؤية - الأرباح',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'اضافة - الأرباح',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'تعديل - الأرباح',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'حذف - الأرباح',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'المرتجعات',
            'guard_name' => 'web', 
            'parent_id' => null,
        ]);
        DB::table('permissions')->insert([
            'name' => 'رؤية - المرتجعات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'اضافة - المرتجعات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'تعديل - المرتجعات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'حذف - المرتجعات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'الباقات',
            'guard_name' => 'web', 
            'parent_id' => null,
        ]);
        DB::table('permissions')->insert([
            'name' => 'رؤية - الباقات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'اضافة - الباقات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'تعديل - الباقات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'حذف - الباقات',
            'guard_name' => 'web', 
            'parent_id' => 1,
        ]);
        DB::table('permissions')->insert([
            'name' => 'المتاجر',
            'guard_name' => 'web', 
            'parent_id' => null,
            'type' => 'store', 
        ]);
        DB::table('permissions')->insert([
            'name' => 'رؤية -المتاجر',
            'guard_name' => 'web', 
            'parent_id' => 1,
            'type' => 'store', 
        ]);
        DB::table('permissions')->insert([
            'name' => 'اضافة -المتاجر',
            'guard_name' => 'web', 
            'parent_id' => 1,
            'type' => 'store', 
        ]);
        DB::table('permissions')->insert([
            'name' => 'تعديل -المتاجر',
            'guard_name' => 'web', 
            'parent_id' => 1,
            'type' => 'store', 
        ]);
        DB::table('permissions')->insert([
            'name' => 'حذف -المتاجر',
            'guard_name' => 'web', 
            'parent_id' => 1,
            'type' => 'store', 
        ]
    );
    }
}
