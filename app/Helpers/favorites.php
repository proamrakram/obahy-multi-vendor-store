<?php

use App\Models\UserFavorite;

if (!function_exists('favorite')) {
    function favorite($product_id)
    {
        $customer  = auth()->user();

        if ($customer) {
            $favorite = UserFavorite::where('user_id', $customer->id)
                ->where('status', 'active')
                ->where('favorites_ref_id', $product_id)
                ->where('is_delete', '0')
                ->first();

            if ($favorite) {
                return true;
            } else {
                return false;
            }
        }
    }
}
