<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        if ($user) {
            if (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'admin_employee') {
                return redirect()->route('admin.home');
            }

            if (auth()->user()->user_type == 'store_admin' || auth()->user()->user_type == 'store_employee') {
                return redirect()->route('store.home');
            }

            if (auth()->user()->user_type == 'customer') {
                return redirect()->route('customer.home-page');
            }
        }

        return redirect()->route('customer.home-page');

        // return route('loanding-home');
    }

    public function adminHome()
    {
        return view('AdminPanel.home');
    }

    public function storeHome()
    {
        return view('Store.home');
    }
}
