<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Language
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('locale')) {
            Session::put('locale', 'ar');
        }

        app()->setLocale(Session::get('locale'));

        $local = $request->lang;

        if (!$local) {
            $local = session('lang', 'ar');
        }

        if ($local == 'ar') {
            session()->put('dir', 'rtl');
        } else {
            session()->put('dir', 'ltr');
        }

        session()->put('lang', $local);

        App::setLocale($local);

        return $next($request);
    }
}
