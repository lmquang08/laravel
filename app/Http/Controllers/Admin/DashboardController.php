<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $sessionUser = $request->session()->get('sessionEmailUser');
        // $sessionUser = $_SESSION['sessionEmailUser'] ?? '';
        return view('admin.dashboard.index',[
            'user' => $sessionUser
        ]);
    }
}
