<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelFaicilities;

class FacilitiesController extends Controller
{
 
    public function index()
    {
        $data = [
            'facilities' => HotelFaicilities::filter()->latest()->paginate(10)->withQueryString()
        ];

        return view('admin.facilities.index', $data);
    }

   
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

 
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
