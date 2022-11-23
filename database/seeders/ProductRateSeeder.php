<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = User::where('user_type', 'customer')->get();

        $products = Product::take(5)->get();

        foreach ($products as $product) {

            foreach ($users as $user) {
                DB::table('product_rates')->insert([
                    'product_id' => $product->id,
                    'user_id' => $user->id,
                    'rate_value' => 3,
                    'status' => 'active',
                    'is_delete' => 0,
                ]);
            }
        }
    }
}
