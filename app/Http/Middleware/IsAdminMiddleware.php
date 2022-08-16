<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
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
        if (Auth::check()->is_admin == '1') 
        {
            return view('users.dashboard');
        } else if(is_admin == '0') {
            return view('sales.sales_dashboard');
        } else{
            return redirect('auth.login')->with('error', 'Login to access website');
        }
            //admin role == 1
            //user role == 0
        //     if (Auth::user()->is_admin == '1') {
        //         return $next($request);
        //       } 
        // else {
        //     return redirect('/page')->with('error', 'No Admin Access!!');
        // }
        // }
        // else {
        //     return redirect('/login')->with('error', 'Login to access website');
        // }
        
        
    }
}