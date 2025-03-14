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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Hotel = Hotel::first();
        $HeroSection = HeroSection::all();
        $RoomCategory = RoomCategory::all();
        $HotelFacilities = HotelFaicilities::all();
        $Gallery = Gallery::all();

        return view('user.index', compact('Hotel', 'HeroSection', 'RoomCategory', 'HotelFacilities', 'Gallery'));
    }

    public function rooms($slug)
    {
        $hotel = Hotel::first();
        $room = RoomCategory::where('slug', $slug)->firstOrFail();
        $rooms = $room->rooms; 

        return view('user.room.index', compact('hotel','rooms', 'room'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
