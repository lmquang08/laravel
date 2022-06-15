<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Hash;



class RegisterController extends Controller
{
    public function index(){
        return view('frontend.register.index');
    }

    public function handleRegister(Request $request, Customers $customer){
        $email = $request->input('email');
        $password = $request->input('password');
        $phone = $request->input('phone');
        $fullName = $request->input('fullname');
        $home_address = $request->input('home_address');
       
        $hasPassword = Hash::make($password);

        $customer->email = $email;
        $customer->password = $hasPassword;
        $customer->phone = $phone;
        $customer->fullname = $fullName;
        $customer->home_address = $home_address;

        $customer->save();
        return redirect()->route('frontend.login')->with('success.add.user', 'Add Success');
    }
}
