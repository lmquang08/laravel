<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use voku\helper\AntiXSS;
use App\Http\Requests\PostLoginRequest as PostLogin;
use App\Models\Admin;
// use Illuminate\Support\Facades\DB;

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
        $infoUser = Admin::where(['email' => $user, 'password' => $password])->first();
        // query builder tra ve object khong phai array

        if($infoUser !== null){
            // oke
            $request->session()->put('sessionEmailUser', $infoUser->email);
            $request->session()->put('sessionIdUser', $infoUser->id);
            $request->session()->put('sessionUser', $infoUser->username);
            // $_SESSION['sessionEmailUser'] = $user;
            return redirect()->route('admin.dashboard');
            // header("Location: index.php?c=dashboard");
        } else {
            // account not exists
            // with : luu vao flash session
            return redirect()->back()->with('invalidLogin', 'Tai khoan khong ton tai');
        }
    }

    public function logout(Request $request)
    {
        // huy session dc tao ra.
        // quay ve trang login
        $request->session()->flush();
        return redirect()->route('admin.login');
    }
}
