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
        DB::table('permissions')->insert([
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
        ]);

        // DB::table('roles')->insert([
        //     'name' => 'admin',
        //     'guard_name' => 'web',
        //     'created_at' => now(),
        //     'type' => 'admin'
        // ]);

        // DB::table('roles')->insert([
        //     'name' => 'مسئوول بيانات المشتركين',
        //     'guard_name' => 'web',
        //     'created_at' => now(),
        //     'type' => 'admin'
        // ]);

        // DB::table('roles')->insert([
        //     'name' => 'store_admin',
        //     'guard_name' => 'web',
        //     'created_at' => now(),
        //     'type' => 'store'
        // ]);

        // DB::table('roles')->insert([
        //     'name' => 'test',
        //     'guard_name' => 'web',
        //     'created_at' => now(),
        //     'type' => 'admin'
        // ]);

        // DB::table('roles')->insert([
        //     'name' => 's',
        //     'guard_name' => 'web',
        //     'created_at' => now(),
        //     'type' => 'store'
        // ]);

        // DB::table('model_has_roles')->insert([
        //     'role_id' => 2,
        //     'model_type' => 'App\Models\User',
        //     'model_id' => 3,
        // ]);

        // DB::table('model_has_roles')->insert([
        //     'role_id' => 2,
        //     'model_type' => 'App\Models\User',
        //     'model_id' => 4,
        // ]);

        // DB::table('model_has_roles')->insert([
        //     'role_id' => 3,
        //     'model_type' => 'App\Models\User',
        //     'model_id' => 6,
        // ]);

        // DB::table('model_has_roles')->insert([
        //     'role_id' => 2,
        //     'model_type' => 'App\Models\User',
        //     'model_id' => 12,
        // ]);

        // DB::table('model_has_roles')->insert([
        //     'role_id' => 1,
        //     'model_type' => 'App\Models\User',
        //     'model_id' => 1,
        // ]);

        // DB::table('model_has_roles')->insert([
        //     'role_id' => 3,
        //     'model_type' => 'App\Models\User',
        //     'model_id' => 2,
        // ]);


        // $role_has_permissions = [
        //     2 => 2,
        //     3 => 2,
        //     4 => 2,
        //     5 => 2,
        //     2 => 4,
        //     3 => 4,
        //     12 => 4,
        //     47 => 4,
        //     70 => 5,
        //     83 => 5,
        //     53 => 3,
        //     54 => 3,
        //     55 => 3,
        //     56 => 3,
        //     58 => 3,
        //     66 => 3,
        //     68 => 3,
        //     70 => 3,
        //     71 => 3,
        //     73 => 3,
        //     74 => 3,
        //     75 => 3,
        //     76 => 3,
        //     78 => 3,
        //     79 => 3,
        //     80 => 3,
        //     81 => 3,
        //     83 => 3,
        //     138 => 3,
        //     140 => 3,
        //     142 => 3,
        //     144 => 3,
        //     145 => 3,
        //     146 => 3,
        //     147 => 3,
        //     149 => 3,
        //     150 => 3,
        //     151 => 3,
        //     152 => 3,
        //     154 => 3,
        //     155 => 3,
        //     156 => 3,
        //     157 => 3,
        //     186 => 3,
        //     188 => 3,
        //     189 => 3,
        //     190 => 3,
        //     191 => 3,
        //     211 => 3,
        //     212 => 3,
        //     225 => 3,
        //     226 => 3,
        //     2 => 1,
        //     3 => 1,
        //     4 => 1,
        //     5 => 1,
        //     7 => 1,
        //     8 => 1,
        //     9 => 1,
        //     10 => 1,
        //     12 => 1,
        //     13 => 1,
        //     14 => 1,
        //     15 => 1,
        //     17 => 1,
        //     22 => 1,
        //     23 => 1,
        //     24 => 1,
        //     25 => 1,
        //     30 => 1,
        //     32 => 1,
        //     42 => 1,
        //     43 => 1,
        //     44 => 1,
        //     45 => 1,
        //     47 => 1,
        //     48 => 1,
        //     49 => 1,
        //     50 => 1,
        //     85 => 1,
        //     87 => 1,
        //     89 => 1,
        //     91 => 1,
        //     93 => 1,
        //     95 => 1,
        //     97 => 1,
        //     101 => 1,
        //     102 => 1,
        //     103 => 1,
        //     104 => 1,
        //     106 => 1,
        //     107 => 1,
        //     108 => 1,
        //     109 => 1,
        //     111 => 1,
        //     112 => 1,
        //     113 => 1,
        //     114 => 1,
        //     116 => 1,
        //     117 => 1,
        //     118 => 1,
        //     119 => 1,
        //     126 => 1,
        //     128 => 1,
        //     129 => 1,
        //     130 => 1,
        //     131 => 1,
        //     133 => 1,
        //     134 => 1,
        //     135 => 1,
        //     136 => 1,
        //     159 => 1,
        //     160 => 1,
        //     161 => 1,
        //     162 => 1,
        //     164 => 1,
        //     165 => 1,
        //     166 => 1,
        //     167 => 1,
        //     169 => 1,
        //     181 => 1,
        //     188 => 1,
        //     189 => 1,
        //     190 => 1,
        //     191 => 1,
        //     200 => 1,
        //     202 => 1,
        //     203 => 1,
        //     204 => 1,
        //     205 => 1,
        //     230 => 1,
        //     231 => 1,
        //     232 => 1,
        //     233 => 1,
        // ];

        // foreach ($role_has_permissions as $permission_id => $role_id) {
        //     DB::table('role_has_permissions')->insert([
        //         'permission_id' => $permission_id,
        //         'role_id' => $role_id
        //     ]);
        // }
    }
}
