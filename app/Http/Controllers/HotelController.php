<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\HeroSection;
use App\Models\RoomCategory;
use App\Models\HotelFaicilities;
use App\Models\Gallery;



class HotelController extends Controller
{
    public function index()
    {
        $Hotel = Hotel::first();
        $HeroSection = HeroSection::all();
        $RoomCategory = RoomCategory::all();
        $HotelFacilities = HotelFaicilities::all();
        $Gallery = Gallery::all();

        return view('user.index', compact('Hotel', 'HeroSection', 'RoomCategory', 'HotelFacilities', 'Gallery'));
    }
}
