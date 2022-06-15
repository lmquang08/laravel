<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLoginHomePage
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
        $emailCustomer  = $request->session()->get('sessionEmailCustomer');
        $checkEmail = filter_var($emailCustomer, FILTER_VALIDATE_EMAIL);
        if(!$checkEmail){
            return redirect()->route('frontend.login');
        }
        return $next($request);
    }
}
