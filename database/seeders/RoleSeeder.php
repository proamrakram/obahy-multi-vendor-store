<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                'name' => 'admin',
                'guard_name' => 'web',
                'type' => 'admin',
            ]
        );
        DB::table('roles')->insert(
            [
                'name' => 'store_admin',
                'guard_name' => 'web',
                'type' => 'store',
            ]
        );
     
    }
}
