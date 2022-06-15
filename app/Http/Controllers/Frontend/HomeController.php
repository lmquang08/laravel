<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Tour;


class HomeController extends Controller
{
    public function index() {
        $tour = Tour::all();
        return view('frontend.home.index', [
            'tour' => $tour
        ]);
    }
}
