<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tour;
use Illuminate\Support\Facades\Storage;


class TourController extends Controller
{
    public function index()
    {
        return view('admin.tour.index');
    }

    public function addTour()
    {
        return view('admin.tour.add');
    }

    public function handleAddTour(Request $request, Tour $tour)
    {
        $name = $request->input('name');
        $start_date = $request->input('start_date'); // YYYY-MM-DD
        $start_date = date('Y-m-d', strtotime($start_date)); // YYYY-MM-DD
        $tour_date = $request->input('tour_date');
        $tour_date = date('Y-m-d', strtotime($tour_date)); // YYYY-MM-DD
        $start_address = $request->input('start_address');
        $transport = $request->input('transport');
        $price = $request->input('price');
        $description = $request->input('description');
        


       
        $image = null;
        if($request->hasFile('image')){
            // kiem tra file co loi ko
            if($request->file('image')->isValid()){
                // $extension = $request->file('avatar')->getClientOriginalExtension();
                // thuc su tien hanh upload file
                // lay ra ten file
                $image = $request->file('image')->hashName();
                // di chuyen vao thu muc
                $request->file('image')->store(PATH_UPLOAD_AVATAR);
                // dd($nameAvatar);
            }
        }   
        $storedPath = PATH_UPLOAD_AVATAR."/".$image;

        $tour->name = $name;
        $tour->start_date = $start_date;
        $tour->tour_date = $tour_date;
        $tour->start_address = $start_address;
        $tour->image = $image;
        $tour->image_path = $storedPath;
        $tour->transport = $transport;
        $tour->price = $price;
        $tour->description = $description;
        
        $tour->save();
        return redirect()->back()->with('');
    }
}
