<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Traits\SessionTrait;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function auth()
    {
        $customer  = auth()->user();

        if ($customer) {
            if ($customer->user_type = "customer") {
                Cart::store($customer->id);
                return true;
            }
        }
    }

    public function existProduct($request, $product)
    {
        $cart_items = Cart::content();

        if ($cart_items) {
            foreach ($cart_items as $cart_item) {
                if ($cart_item->id == $request->product_id) {

                    Cart::update($cart_item->rowId, [
                        "name" => $product->product_name,
                        "price" => $product->product_price,
                        "qty" => $request->qty,
                        "options" => [
                            "sizes" => $request->sizes,
                            "colors" => $request->colors
                        ]
                    ]);

                    $this->auth();
                    return true;
                }
            }
        }
    }

    public function getAuthContent()
    {
        $customer  = auth()->user();

        if ($customer) {
            if ($customer->user_type = "customer") {
                return Cart::restore($customer->id);
            }
            return false;
        }

        return false;
    }

    public function index()
    {
        $customer  = auth()->user();

        $cart_items = Cart::content();

        $result = $this->getAuthContent();

        if ($result) {
            $cart_items = $result;
        }

        return view('Website.customer.cart', compact(['cart_items']));
    }

    public function cartList()
    {
    }

    public function addToCart(Request $request)
    {
        $product = $this->getProduct($request);

        $result = $this->existProduct($request, $product);

        if ($result) {
            return response()->json([
                "success" => __('Product has beed updated in your cart successfully'),
                "count" => cart_count()
            ]);
        }

        Cart::add(
            [
                "id" => $product->id,
                "name" => $product->product_name,
                "qty" => $request->qty,
                "price" => $product->product_price,
                "options" => [
                    'sizes' => $request->sizes,
                    'colors' => $request->colors,
                ],
                21
            ]
        )->associate(Product::class);

        $this->auth();

        return response()->json(["success" => __('Product has beed add to your cart successfully',), "count" => cart_count()]);
    }

    public function removeCart($rowId)
    {
        Cart::remove($rowId);

        $this->auth();

        return  redirect()->back()->with(["success" => __('Product has beed removed from your cart successfully')]);
    }

    public function clearAllCart()
    {
    }

    public function productList()
    {
    }

    public function updateCart(Request $request)
    {
        $product = $this->getProduct($request);

        $cart_items = Cart::content();

        foreach ($cart_items as $cart_item) {
            if ($cart_item->rowId == $request->rowId) {

                Cart::update($cart_item->rowId, [
                    "name" => $product->product_name,
                    'price' => $product->product_price,
                    'qty' => $request->qty,
                ]);

                $this->auth();

                return response()->json([
                    "success" => __('Product has beed updated in your cart successfully'),
                    "total" => Cart::total(),
                    "subTotal" => Cart::subtotal()

                ]);
            }
        }

        return response()->json(["info" => __('This Product is not in your cart !!')]);
    }

    public function getProduct($request)
    {
        return Product::language()
            ->where('id', $request->product_id)
            ->where('is_delete', '0')
            ->first();
    }
}
