<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;

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
        // Add categories
        Category::create([
            'id'=>1,
            'name'=>"Car parts",
            'parent'=>null
        ]);
        Category::create([
            'id'=>2,
            'name'=>"Oils & fluids",
            'parent'=>null
        ]);
        Category::create([
            'id'=>3,
            'name'=>"Filters",
            'parent'=>null
        ]);
        Category::create([
            'id'=>4,
            'name'=>"Car tires",
            'parent'=>null
        ]);
        Category::create([
            'id'=>5,
            'name'=>"Autocosmetics & Accessories",
            'parent'=>null
        ]);

        for ($i=6; $i < 11; $i++) { 
            Category::create([
                'id'=>$i,
                'name'=>$i . " CAT",
                'parent'=>11 - $i
            ]);
        }
        for ($i=11; $i < 21; $i++) { 
            Category::create([
                'id'=>$i,
                'name'=>$i . " CAT",
                'parent'=>(int) ($i / 2)
            ]);
        }

        // Add items

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
            'name'=>'SOME BREAKPADS NUMBER 1234567890 LOIREN IIPUM', 
            'category_id'=>1, 
            'new_price'=>100 + 12.45, 
            'old_price'=>200 + 12.45, 
            'description'=>$description, 
            'info_json'=>$info_json
        ]);

        Item::create([
            'id'=>2, 
            'name'=>'special BREAKPADS NUMBER 1234567890 LOIREN IIPUM', 
            'category_id'=>1, 
            'new_price'=>100 + 12.45, 
            'old_price'=>100 + 12.45, 
            'description'=>$description, 
            'info_json'=>$info_json
        ]);

        Item::create([
            'id'=>3, 
            'name'=>'SOME BREAKPADS NUMBER 1111234567890 LOIREN IIPUM', 
            'category_id'=>1, 
            'new_price'=>100 + 12.45, 
            'old_price'=>300 + 12.45, 
            'description'=>$description, 
            'info_json'=>$info_json
        ]);

        for ($i=4; $i < 11; $i++) { 
            Item::create([
                'id'=>$i, 
                'name'=>$i . ' ITEM', 
                'category_id'=>$i - 2, 
                'new_price'=>$i * 10 + 12.45, 
                'old_price'=>$i * 10 + 13.45,
                'description'=>$description, 
                'info_json'=>$info_json
            ]);
        }

        for ($i=11; $i < 50; $i++) { 
            Item::create([
                'id'=>$i, 
                'name'=>$i . ' ITEM', 
                'category_id'=>(int) ($i / 2) - 4, 
                'new_price'=>$i * 10 + 12.45, 
                'old_price'=>$i * 10 + 13.45,
                'description'=>$description, 
                'info_json'=>$info_json
            ]);
        }

        
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
