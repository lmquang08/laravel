<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use voku\helper\AntiXSS;
use App\Http\Requests\HomeLoginRequest as PostLogin;
use App\Models\Customers;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        $customer = Customers::all();
        return view('frontend.login.index',
        [
               'customer' => $customer
        ]);
    }

    public function handleLogin(PostLogin $request, AntiXSS $antiXSS)
    {
        $user     = $request->input('emailCustomer');
        $user     = $antiXSS->xss_clean($user);
        $password = $request->input('passwordCustomer');
        $password = $antiXSS->xss_clean($password);
        $infoUser = Customers::where(['email' => $user])->first();
        // query builder tra ve object khong phai array

        if($infoUser !== null){
            $hashPassword = $infoUser->password; // mk da ma hoa
            if(Hash::check($password, $hashPassword)){
                // oke
                $request->session()->put('sessionEmailCustomer', $infoUser->email);
                $request->session()->put('sessionIdCustomer', $infoUser->id);
                $request->session()->put('sessionCustomer', $infoUser->username);
                $request->session()->put('sessionAvatarCustomer', $infoUser->avatar);

                // $_SESSION['sessionEmailUser'] = $user;
                return redirect()->route('frontend.home.index');
                // header("Location: index.php?c=dashboard");
            }
            return redirect()->back()->with('invalidLogin', 'Tai khoan khong ton tai');       
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
        return redirect()->route('frontend.login');
    }
}
