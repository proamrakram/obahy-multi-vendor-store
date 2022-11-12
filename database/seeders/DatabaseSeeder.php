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
            PermissionSeeder::class,
            PackageItemSeeder::class,
            PaymentTypeSeeder::class,
            StorePackageSeeder::class,
            StoreSeeder::class,
            ProductCategorySeeder::class,
            ProductColorSeeder::class,
            ProductSeeder::class,
            ProductCommentSeeder::class,
            ProductRateSeeder::class,
            ProductImageSeeder::class
        ]);
    }
}
