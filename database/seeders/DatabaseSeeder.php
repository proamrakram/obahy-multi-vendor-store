<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountrySeeder::class,
            CitySeeder::class,
            CurrencySeeder::class,
            UserSeeder::class,

            #Permissions
            PermissionSeeder::class,
            RoleSeeder::class,
            RoleHasPermissionSeeder::class,
            ModelHasRoleSeeder::class,
            SettingsSeeder::class,

            #Packages and Stores
            PackageItemSeeder::class,
            PaymentTypeSeeder::class,
            StorePackageSeeder::class,
            StoreSeeder::class,

            #Website Settings
            WebsiteSettingsSeeder::class,
            ProductCategorySeeder::class,
            ProductColorSeeder::class,
            ProductSeeder::class,
            ProductCommentSeeder::class,
            ProductRateSeeder::class,
            ProductImageSeeder::class,
            WebsiteSettingsSeeder::class,

        ]);
    }
}
