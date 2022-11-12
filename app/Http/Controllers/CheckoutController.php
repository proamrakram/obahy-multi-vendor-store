<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $customer  = auth()->user();

        $cart_items = Cart::content();

        $result = $this->getAuthContent();

        if ($result) {
            $cart_items = $result;
        }

        return view('Website.customer.checkout', compact(['cart_items']));
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
}
