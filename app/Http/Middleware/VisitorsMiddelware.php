<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Vsitor;
use App\Services\IpStack;
use Illuminate\Support\Facades\Log;

class VisitorsMiddelware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            //code...
            $vistor_id = auth()->user()?auth()->id():0 ;
            $vistor =  Vsitor::where('ip', $request->ip())->orWhere('visitor_id',$vistor_id)->first();
            if (!$vistor) {
                try {
                $geoip = new IpStack(config('services.ipstack.key'));
                $response = $geoip->get(request()->ip());
                    //code...


                Vsitor::create([
                    'method'=>$request->method(),
                    'request'=>$request,
                    'url'=>$request->url(),
                    'referer'=>$request->route()->parameters()??null,
                    'country'=>$response['country_name'],
                    'city'=>$response['city'],

                    'languages'=>$request->getPreferredLanguage(),
                    'useragent'=>$request->userAgent(),
                    'headers'=>$request->header(),

                    'device'=>$request->header('sec-ch-ua-mobile')=='?0'?'mobile':'browser',
                    'ip'=>$request->ip(),

                    'visitor_id'=>auth()->user()?auth()->id():null,
                    'visitor_type'=>auth()->user()?auth()->user()->user_type:null,

                ]);
            } catch (\Throwable $th) {
                //throw $th;
                Log::info('the IPSTACK ENV is not workig any more');
            }
            }
            return $next($request);
        } catch (\Throwable $th) {
            return $th;
        }

    }
}
