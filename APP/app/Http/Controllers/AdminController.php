<?php

namespace App\Http\Controllers;

use App\Models\Filter;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('name', 'asc')->paginate(20);
        return view('admin', compact('items'));
    }


    public function new_item()
    {
        $categories = Category::orderBy('name', 'asc')->get();

        $brands = Filter::where('name', 'like', 'Brand')->first();
        $brands = explode(";", $brands->values);
        $colors = Filter::where('name', 'like', 'Color')->first();
        $colors = explode(";", $colors->values);
        $materials = Filter::where('name', 'like', 'Material')->first();
        $materials = explode(";", $materials->values);


        return view('admin_item', compact('categories', 'brands', 'colors', 'materials'))->with('item', null);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->hasFile('image')) {
            dd('file was null');
            return redirect()->route('new.item');
        }

        $request->validate([
            'product_price' => 'required|gte:0.1|lte:9999999',
        ]);
        $rounded_price = round($request->product_price, 2);

        $info_json = '{ "brand" : "'.$request->brands
            . '", "color" : "'. $request->colors
            . '", "material" : "'.$request->materials
            . '" }';

        $id = Item::withTrashed()->orderBy('id', 'desc')->first();
        $id = $id == null ? 1 : $id->id + 1;

        $item = Item::create([
            'id' => $id,
            'name'=> $request->product_name,
            'category_id'=> $request->categories,
            'new_price' => $rounded_price,
            'old_price' => $rounded_price,
            'description' => $request->product_description,
            'info_json' => $info_json
        ]);

        $filename = $id.'.jpg';

        $image_resize = Image::make($request->image->getRealPath());

        $ratios = [500, 200, 100];
        foreach($ratios as $ratio)
        {
            if ($image_resize->width() > $ratio) {
                $image_resize->resize($ratio, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            if ($image_resize->height() > $ratio) {
                $image_resize->resize(null, $ratio, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }

            $image_resize->resizeCanvas($ratio, $ratio, 'center', false, '#ffffff');
            $image_resize->save(public_path('images/items_'.$ratio.'/'.$filename));

        }

        return redirect()->route('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::where('id', $id)->first();
        $categories = Category::orderBy('name', 'asc')->get();

        $brands = Filter::where('name', 'like', 'Brand')->first();
        $brands = explode(";", $brands->values);
        $colors = Filter::where('name', 'like', 'Color')->first();
        $colors = explode(";", $colors->values);
        $materials = Filter::where('name', 'like', 'Material')->first();
        $materials = explode(";", $materials->values);

        return view('admin_item', compact('item', 'categories', 'brands', 'colors', 'materials'));

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
        $request->validate([
            'product_price' => 'required|gte:0.1|lte:9999999',
        ]);
        $rounded_price = round($request->product_price, 2);

        $info_json = '{ "brand" : "'.$request->brands
            . '", "color" : "'. $request->colors
            . '", "material" : "'.$request->materials
            . '" }';

        $old_item = Item::where('id', $id)->first();

        if ($rounded_price == $old_item->new_price) {
            $old_price = $old_item->old_price;
        } else {
          $old_price = $old_item->new_price;
        }

        Item::where('id', $id)->update([
            'name'=> $request->product_name,
            'category_id'=> $request->categories,
            'new_price' => $rounded_price,
            'old_price' => $old_price,
            'description' => $request->product_description,
            'info_json' => $info_json
        ]);

        if($request->hasFile('image')) {
            $filename = $id . '.jpg';

            $image_resize = Image::make($request->image->getRealPath());

            $ratios = [500, 200, 100];
            foreach ($ratios as $ratio) {
                if ($image_resize->width() > $ratio) {
                    $image_resize->resize($ratio, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }

                if ($image_resize->height() > $ratio) {
                    $image_resize->resize(null, $ratio, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }

                $image_resize->resizeCanvas($ratio, $ratio, 'center', false, '#ffffff');
                $image_resize->save(public_path('images/items_' . $ratio . '/' . $filename));
            }
        }

        return redirect()->route('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::destroy($id);

        File::delete(public_path('images/items_' . 500 . '/' . $id . '.jpg'));
        File::delete(public_path('images/items_' . 200 . '/' . $id . '.jpg'));
        File::delete(public_path('images/items_' . 100 . '/' . $id . '.jpg'));

        //vymazat obrazky
        return redirect()->route('admin');
    }
}
