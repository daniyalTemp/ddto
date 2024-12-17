<?php

namespace App\Http\Middleware;

use App\Models\comments;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
class getConfigForAll
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $unseenComment = (count(comments::where('seen' , false)->get()) )>0 ?true :false;

        View::share(['unseenComment' => $unseenComment]);
        return $next($request);
    }
}
