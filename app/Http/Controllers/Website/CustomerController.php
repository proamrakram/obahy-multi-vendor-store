<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Store;
use App\Models\StorePackage;
use App\Models\StoreSubscription;
use App\Models\StoreType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $categorise = ProductCategory::root()->get();
        $new_products = Product::language()->where('product_type', 'model')->latest()->with(['rates'])->take(6)->get();
        $latest_fabrics_products = Product::language()->where('store_type_id', 12)->latest()->with(['rates'])->get();
        $count = $latest_fabrics_products->count();

        if ($count > 3) {
            $latest_fabrics_products = $latest_fabrics_products->random(3);
        } else {
            $latest_fabrics_products = $latest_fabrics_products->random($count);
        }

        $custom_made_products = Product::language()->where('product_type', 'custom_made')->latest()->with(['rates'])->take(3)->get();
        $stores_types = StoreType::language()->where('store_type_status', 'active')->get()->take(3);

        return view('Website.customer.home', compact(['categorise', 'new_products', 'custom_made_products', 'stores_types', 'latest_fabrics_products']));
    }

    public function storeType($store_type_slug)
    {
        $store_type_model = StoreType::where('slug', $store_type_slug)->first();
        return view('Website.stores.index')
            ->with('store_type_slug', $store_type_slug)->with('products', false);
    }

    public function storeDetails($store_type_slug, $store_name_slug)
    {

        if ($store_type_slug == 'fabrics-materials') {
            return view('Website.stores.index', ['store_type_slug' => $store_type_slug, 'store_name_slug' => $store_name_slug, 'products' => true]);
        }

        return view('Website.stores.details', ['store_type_slug' => $store_type_slug, 'store_name_slug' => $store_name_slug]);
    }

    public function storeProductDetails($store_type_slug, $store_name_slug, $product_id)
    {
        $product = Product::language()
            ->where('is_delete', '0')
            ->where('product_status', 'active')
            ->where('id', $product_id)->first();

        $store = Store::language()
            ->where('is_delete', '0')
            ->where('store_status', 'active')
            ->where('slug', $store_name_slug)
            ->where('store_type_slug', $store_type_slug)
            ->where('id', $product->store_id)->first();

        $store_type = StoreType::language()
            ->where('id', $store->store_type_id)
            ->where('slug', $store_type_slug)->first();

        $store_admin = User::where('id', $store->store_admin)
            ->where('is_delete', '0')
            ->where('user_type', 'store_admin')
            ->first();

        $related_products = Product::language()
            ->where('id', $product->id)
            ->first()
            ->relatedProducts($product->product_type, $store->id)
            ->get();


        if ($product->product_type == 'custom_made') {
            return view('Website.products.custom-product-details', [
                'product' => $product,
                'custom' => $product->custom,
                'store' => $store,
                'store_type' => $store_type,
                'store_admin' => $store_admin,
                'related_products' => $related_products,
                'store_type_slug' => $store_type_slug,
                'store_name_slug' => $store_name_slug,
                'product_id' => $product_id
            ]);
        }

        return view('Website.stores.product-deatils', [
            'product' => $product,
            'store' => $store,
            'store_type' => $store_type,
            'store_admin' => $store_admin,
            'related_products' => $related_products,
            'store_type_slug' => $store_type_slug,
            'store_name_slug' => $store_name_slug,
            'product_id' => $product_id
        ]);
    }

    public function loandingHome()
    {
        $gold_store_package = StorePackage::language()->where('package_type', 'gold')->first();
        $silver_store_package = StorePackage::language()->where('package_type', 'silver')->first();
        $free_store_package = StorePackage::language()->where('package_type', 'free')->first();

        return view('Website.customer.loanding-home', [
            'gold_store_package' => $gold_store_package,
            'silver_store_package' => $silver_store_package,
            'free_store_package' => $free_store_package,
        ]);
    }

    public function createStorePage(Request $request, $package_id = null)
    {
        $email = $request->email;
        $stores_types = StoreType::where('is_delete', 0)->get();

        return view('Website.customer.create-store', compact([
            'email',
            'package_id',
            'stores_types'
        ]));
    }

    public function createStore(Request $request)
    {
        $email = $request->email;

        $request->validate([
            "store_title" => ['required', 'string'],
            "store_url" => ['required', 'string', 'regex:/^[A-Za-z0-9]+(?:-[A-Za-z0-9]+)+$/'],
            "entity_type" => ['required'],
            "commercial_registration_link" => ['required'],
            "id_number" => ['required'],
            "registration_number_in_trusted" => ['required'],
            "store_manager" => ['required'],
            "phone_number" => ['required', 'unique:stores,phone_number'],
            "phone_number" => ['required', 'unique:users,phone_number'],
            "email" => ['required', 'unique:stores,email'],
            "password" => ['required'],
            "confirm_password" => ['required'],
            "package_id" => ['nullable'],
        ]);

        //Here the scenario of storing store and link packages

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $request->store_title,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'user_type' => 'store_admin',
                'password' => Hash::make($request->password),
            ]);

            $user->assignRole('store_admin');
        }

        $store_type = StoreType::where('id', $request->entity_type)->first();

        if ($user) {

            $store = Store::create([
                'store_name_ar' => $request->store_title,
                'store_name_en' => $request->store_title,
                'phone_number' => $request->phone_number,
                'store_domain' => env('APP_URL') . $request->store_url,
                'slug' => $request->store_url,
                'store_type_slug' => $store_type->slug,
                'email' => $request->email,
                'store_admin' => $user->id,
                'store_type_id' => $request->entity_type,
                'subscription_start_date' => now(),
                'subscription_end_date' => now()->addDays(10),
                'store_status' => 'active',
                'is_trail' => '1',
                'commercial_record' => $request->commercial_registration_link,
                'registration_number_in_trusted' => $request->registration_number_in_trusted,
                'id_number' => $request->id_number,
                'store_logo' => 'team_member_' . random_int(2, 5) . '.png',
                'is_delete' => '0',
                'store_currency' => 1,
                'store_country' => 1,
                'store_city' => 1,
                // 'store_details_en',
                // 'store_details_ar',
                // 'store_address_en',
                // 'store_address_ar',

                // 'store_description_ar' => $request->store_description_ar,
                // 'store_description_en' => $request->store_description_en,
                // 'address_ar' => $request->address_ar,
                // 'address_en' => $request->address_en,

                // 'payment_type' => $request->payment_type,

            ]);

            if ($store) {
                StoreSubscription::create([
                    'store_id' => $store->id,
                    'package_id' => $request->package_id ?? 3,
                    'subscription_start_date' => $store->subscription_start_date,
                    'subscription_end_date' => '',
                    'subscription_status' => 'active',
                    'is_delete' => '0'
                ]);
            }

            $user->update([
                'store_id' => $store->id
            ]);
        }

        return true;
    }

    public function storeYourDesignerDetails()
    {
        return view('Website.store-your-designers-details');
    }

    public function sizeDe1()
    {
        return view('Website.size_details');
    }

    public function sizeDe2()
    {
        return view('Website.size_details_1');
    }

    public function sizeDe3()
    {
        return view('Website.size_details_2');
    }

    public function sizeDe4()
    {
        return view('Website.size_details_3');
    }

    public function sizeDe5()
    {
        return view('Website.size_details_4');
    }

    public function sizeDe6()
    {
        return view('Website.size_details_5');
    }

    public function sizeDe7()
    {
        return view('Website.size_details_6');
    }
}
