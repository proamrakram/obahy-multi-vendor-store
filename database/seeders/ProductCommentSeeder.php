<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCommentSeeder extends Seeder
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
                DB::table('product_comments')->insert([
                    'product_id' => $product->id,
                    'user_id' => $user->id,
                    'comment' => "الجودة هي الأولى مع أفضل خدمة. جميع عملائنا هم أصدقائنا. تصميم عصري ، علامة تجارية جديدة 100% ، جودة عالية!",
                    'status' => 'active',
                    'stars' => 1,
                    'is_delete' => 0,
                ]);
            }
        }
    }
}
