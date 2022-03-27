<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use voku\helper\AntiXSS;
use App\Http\Requests\PostLoginRequest as PostLogin;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }

    public function handleLogin(PostLogin $request, AntiXSS $antiXSS)
    {
        $user     = $request->input('emailUser');
        $user     = $antiXSS->xss_clean($user);
        $password = $request->input('passwordUser');
        $password = $antiXSS->xss_clean($password);

        if($user === 'trieunt@gmail.com' && $password === '123456789'){
            // oke
            $request->session()->put('sessionEmailUser', $user);
            // $_SESSION['sessionEmailUser'] = $user;
            return redirect()->route('admin.dashboard');
            // header("Location: index.php?c=dashboard");
        } else {
            // account not exists
            // with : luu vao flash session
            return redirect()->back()->with('invalidLogin', 'Tai khoan khong ton tai');
        }
    }
}
