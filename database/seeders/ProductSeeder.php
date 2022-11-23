<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Store;
use App\Models\StoreType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $products = Product::all();

        // foreach ($products as $product) {

        //     $store = Store::find($product->store_id);

        //     if ($product->product_type == 'model') {
        //         $product->update([
        //             'product_main_image' => $store->store_type_slug == 'fabrics-materials' ? 'Fabric_' . random_int(1, 3) . '.png' : 'p' . random_int(1, 3) . '.png',
        //         ]);
        //     } else {
        //         $product->update([
        //             'product_main_image' => $store->store_type_slug == 'fabrics-materials' ? 'Fabric_' . random_int(1, 3) . '.png' : 'p' . random_int(4, 6) . '.png',
        //         ]);
        //     }
        // }


        $x = 0;
        $types = ['ready_made', 'custom_made', 'service', 'template', 'model'];
        $stores = Store::all();

        foreach ($stores as $store) {

            $times = 0;

            while ($times <= 3) {

                $x = $x + 1;

                $type = $types[random_int(0, 4)];
                if ($type == 'model') {
                    $image = $store->store_type_slug == 'fabrics-materials' ? 'Fabric_' . random_int(1, 3) . '.png' : 'p' . random_int(1, 3) . '.png';
                } else {
                    $image =  $store->store_type_slug == 'fabrics-materials' ? 'Fabric_' . random_int(1, 3) . '.png' : 'p' . random_int(4, 6) . '.png';
                }


                DB::table('products')->insert(
                    [
                        'id' => $x,
                        'store_id' => $store->id,
                        'slug' => Str::slug('product-test-' . $x),
                        'product_name_en' => 'product-test-' . $x,
                        'product_name_ar' => 'منتج-اختبار-' . $x,
                        'store_type_id' => $store->store_type_id,
                        'product_description_en' => "Stracci",
                        'product_description_ar' => "ترنج شتوي",
                        'product_type' => $type,
                        'product_category' => random_int(1, 14),
                        'product_size' => json_encode(['S', 'M', 'L', 'XL', 'XXL']),
                        'product_serial_number' => random_int(1111111111, 9999999999),
                        'product_vat' => '20',
                        'product_vat_value' => '21',
                        'product_price' => random_int(50, 300),
                        'product_price_after_vat' => 21,
                        'wholesale_price' => random_int(50, 300),
                        'is_affiliate' => 0,
                        'affiliate_type' => 'ratio',
                        'affiliate_value' => 4.5,
                        'product_status' => 'active',
                        'in_stock' => 0,
                        'product_3d_image' => "",
                        'product_main_image' => $image,
                        'is_delete' => 0,
                    ]
                );

                $times = $times + 1;
            }
        }

        $products = Product::all();

        foreach ($products as $product) {
            foreach ([1, 2, 3, 4, 5] as $color_id) {

                DB::table('colors_of_product')->insert([
                    'product_id' => $product->id,
                    'color_id' => $color_id
                ]);
            }
        }
    }
}
