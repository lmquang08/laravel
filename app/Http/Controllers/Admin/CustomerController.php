<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Hash;



class CustomerController extends Controller
{
    public function index()
    {
        return view('admin.customers.index');
    }

    public function addCustomer()
    {
        return view('admin.customers.add');
    }

    public function handleAddCustomer(Request $request, Customers $customer)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $phone = $request->input('phone');
        $fullName = $request->input('fullname');
        $home_address = $request->input('home_address');
        $order_address = $request->input('order_address');
        $gender = $request->input('gender');
        $gender = $gender === '0' || $gender === '1' ? $gender : '0';
        $birthday = $request->input('birthday'); // YYYY-MM-DD
        $birthday = date('Y-m-d', strtotime($birthday)); // YYYY-MM-DD

        $nameAvatar = null;
        if ($request->hasFile('avatar')) {
            // kiem tra file co loi ko
            if ($request->file('avatar')->isValid()) {
                // $extension = $request->file('avatar')->getClientOriginalExtension();
                // thuc su tien hanh upload file
                // lay ra ten file
                $nameAvatar = $request->file('avatar')->hashName();
                
                // di chuyen vao thu muc
                $request->file('avatar')->store(PATH_UPLOAD_AVATAR);
            }
        }

        
        $hasPassword = Hash::make($password);

        $customer->email = $email;
        $customer->password = $hasPassword;
        $customer->phone = $phone;
        $customer->fullname = $fullName;
        $customer->home_address = $home_address;
        $customer->order_address = $order_address;
        $customer->gender = $gender;
        $customer->birthday = $birthday;
        $customer->avatar = $nameAvatar;

        $customer->save();
        return redirect()->back();
    }

    
}
