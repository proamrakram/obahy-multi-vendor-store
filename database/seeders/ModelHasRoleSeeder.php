<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class ModelHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('model_has_roles')->insert(
            [
                'model_id' => 1,
                'model_type' => 'App\Models\User',
                'role_id' => 1,
            ]
        );
        DB::table('model_has_roles')->insert(
            [
                'model_id' => 2,
                'model_type' => 'App\Models\User',
                'role_id' => 2,
            ]
        );
    }
}
