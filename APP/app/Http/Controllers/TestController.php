<?php

namespace App\Http\Controllers;

use App\Models\Item;

use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $description = "Mounting guide: Lorem ipsum dolor sit. Recommendations: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";
        $info_json = '{
            "Brand": "BRUMBO",
            "Height [mm]": 39.5,
            "Fitting Position": "Front Axle",
            "Diameter [mm]": 291,
            "Brake Disc Type": "Solid",
            "Brake Disc Thickness [mm]": 10,
            "Minimum Thickness [mm]": 8,
            "Number of Holes": 6,
            "Bolt Hole Circle Ø [mm]": 100
        }';
        Item::create([
            'id'=>1, 
            'name'=>'second ITEM EVER 0010', 
            'category_id'=>1, 
            'price'=>563.45, 
            'sale'=>50, 
            'description'=>$description, 
            'info_json'=>$info_json
        ]);

        return view('test');
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
