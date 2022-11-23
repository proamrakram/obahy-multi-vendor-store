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
            // PermissionSeeder::class,
           PackageItemSeeder::class,
            PaymentTypeSeeder::class,
            StorePackageSeeder::class,
            StoreSeeder::class,
<<<<<<< HEAD
            // ProductCategorySeeder::class,
            // ProductColorSeeder::class,
            // ProductSeeder::class,
            // ProductCommentSeeder::class,
            // ProductRateSeeder::class,
            // ProductImageSeeder::class,
            WebsiteSettingsSeeder::class
=======
            ProductCategorySeeder::class,
            ProductColorSeeder::class,
            ProductSeeder::class,
            ProductCommentSeeder::class,
            ProductRateSeeder::class,
            ProductImageSeeder::class,
            
            WebsiteSettingsSeeder::class,

            PermissionSeeder::class,
            RoleSeeder::class,
            
            RoleHasPermissionSeeder::class,
            ModelHasRoleSeeder::class,
            SettingsSeeder::class,
>>>>>>> 30c0e7d00b81cbdf1d9237ef50ce33cc79c31dfa
        ]);
    }
}
