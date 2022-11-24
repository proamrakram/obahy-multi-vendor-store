<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_permissions = Permission::where('type', 'admin')->get();
        $store_permissions = Permission::where('type', 'store')->get();
        foreach ($admin_permissions as $p) {
            DB::table('role_has_permissions')->insert(
                [
                    'permission_id' => $p->id,
                    'role_id' => 1,
                ]
            );
        }
        foreach ($store_permissions as $p) {
            DB::table('role_has_permissions')->insert(
                [
                    'permission_id' => $p->id,
                    'role_id' => 2,
                ]
            );
        }
    }
}
