<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        if(Auth::check()){
            if(Auth::user()->role == 1 && Auth::user()->status == 1){
                return $next($request);
            }elseif((Auth::user()->role == 0 || Auth::user()->role == 1) && Auth::user()->status == 1){
                return redirect('/');
            } else {
                // dd(Auth::user()->name);
                session('false', 'Tài khoản của bạn đã bị khóa');
                return redirect()->route('logout');
            }
        }else{
            return redirect()->route('auth.getLogin');
        }
    }
}
