<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TokenAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $permission = 0)
    {
        // kiem tra id permission voi session luu tru toan bo id permission account de biet co quyen gi
        $strSessionPermission = $request->session()->get('permissionSessionUser');
        $arrSessionPermission = explode(',', $strSessionPermission);
        if(!in_array($permission, $arrSessionPermission)){
            // dieu huong thong bao khong co quyen truy cap
            return redirect()->route('admin.not-permission');

        }
        return $next($request);
    }
}
