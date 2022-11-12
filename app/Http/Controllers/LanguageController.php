<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config as FacadesConfig;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class LanguageController extends Controller {

    public function index(Request $request){
        $lang = $request->get('code');
//        session(['lang'=>$lang]);

        if (in_array($lang, config('app.locales'))) {
            \Config::set('app.locale_prefix', $lang);
            \Session::put('locale',$lang);
            \App::setLocale($lang);
        }

        return redirect(config('app.prefix','admin'));
    }


    public function switchLang($lang)
    {
        if (in_array($lang, config('app.locales'))) {
            FacadesConfig::set('app.locale_prefix', $lang);
            Session::put('locale',$lang);
            App::setLocale($lang);
        }
        return Redirect::back();
    }


}
