<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,string $rank)
    {
        if($rank =='admin' && Auth::user()->rank != 1){
            abort(code:403);
        }
        if($rank =='staff' && Auth::user()->rank !=2){
            abort(code:403);
        }
        if($rank =='student' && Auth::user()->rank !=3){
            abort(code:403);
        }
        return $next($request);
    }
}
