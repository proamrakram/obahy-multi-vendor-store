<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\UserFavorite;
use Illuminate\Http\Request;

class UserFavoritesController extends Controller
{
    public function addFavorite(Request $request)
    {
        $customer = auth()->user();

        $product_id = $request->product_id;

        $favorite = UserFavorite::where('user_id', $customer->id)
            ->where('favorites_ref_id', $product_id)
            ->where('status', 'active')
            ->where('is_delete', '0')
            ->first();

        if ($favorite) {
            $favorite->update(['is_delete' => '1']);
            return response()->json([
                'info' =>  __('Product has been removed from your favorites products'),
            ]);
        }

        $favorite = UserFavorite::where('user_id', $customer->id)
            ->where('favorites_ref_id', $product_id)
            ->where('status', 'active')
            ->where('is_delete', '1')
            ->first();

        if ($favorite) {
            $favorite->update(['is_delete' => '0']);
            return response()->json([
                'success' =>  __('Product has been added to your favorites products'),
            ]);
        }

        UserFavorite::create([
            'favorites_type' => "product",
            'user_id' => $customer->id,
            'favorites_ref_id' => $product_id,
            'status' => 'active',
            'is_delete' => '0',
        ]);

        return response()->json([
            'success' =>  __('Product has been added to your favorites products'),
        ]);
    }
}
