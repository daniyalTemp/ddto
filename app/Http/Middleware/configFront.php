<?php

namespace App\Http\Middleware;

use App\Models\orders;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class configFront
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        if (!orders::find(Cookie::get('order_id'))) {
//        Cookie::expire('ddtoOrderId');
//        }
//        Cookie::expire('ddtoOrderId');
//        dd(Cookie::get('ddtoOrderId'));
        if (Cookie::has('ddtoOrderId')&&Cookie::get('ddtoOrderId')!=null) {
            $card = orders::find(Cookie::get('ddtoOrderId'))->Products()->withPivot(['size','color','material' , 'count','finalPrice'])->get();
//        dd($card);
//            dd($card[]);
            View::share(['card' => $card]);

        }
        return $next($request);
    }
}
