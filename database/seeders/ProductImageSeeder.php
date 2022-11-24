<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $products = Product::all();

        foreach ($products as $product) {

            $x = 0;
            $image = 'pdm_' . random_int(1, 2) . '.png';
            ProductImage::create([
                'product_id' =>  $product->id,
                'is_main' => 1,
                'image' =>  $image,
                'status' =>  'active',
                'is_delete' => 0
            ]);

            while ($x < 5) {

                if ($product->product_type == 'model') {
                    $image = 'pdm_' . random_int(1, 2) . '.png';

                    // $product_images = ProductImage::where('product_id', $product->id)->first();
                    // if ($product_images) {
                    //     $product_images->update([
                    //         'image' =>  $image,
                    //     ]);
                    // }

                } else {
                    $image = 's-' . random_int(1, 16) . '.jpg';
                }

                ProductImage::create([
                    'product_id' =>  $product->id,
                    'is_main' => 0,
                    'image' =>  $image,
                    'status' =>  'active',
                    'is_delete' => 0
                ]);

                $x = $x + 1;
            }
        }
    }
}
