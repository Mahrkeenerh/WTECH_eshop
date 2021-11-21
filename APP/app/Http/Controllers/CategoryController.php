<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Item::where('name', 'ilike', '%'.$request->top_searchbar.'%')->orWhere('description', 'ilike', '%'.$request->top_searchbar.'%')
            ->orWhere('info_json', 'ilike', '%'.$request->top_searchbar.'%')->paginate(3);

        return view('category', compact('items'))->with('current_category', null)->with('parent_categories', array())
        ->with('child_categories', array());
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

    private function getFilterCategories($items, $category_name)
    {
        $filter_category = array();
        foreach ($items as $item)
        {
            $item_info_json = json_decode($item->info_json, true);
            array_push($filter_category, $item_info_json[$category_name]);
        }
        $filter_category = array_unique($filter_category, SORT_STRING);

        return $filter_category;
    }

    private function find_category($categories, $id)
    {
        foreach ($categories as $category) {
            if ($category->id == $id)
                return $category;
        }
        return null;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $current_category = Category::where('id', $id)->first();

        // All categories
        $categories = Category::all();

        // Filter parent categories
        $parent_categories = array();
        $parent = $this->find_category($categories, $current_category->parent);
        while ($parent != null)
        {
            array_push($parent_categories, $parent);
            $parent = $this->find_category($categories, $parent->parent);
        }
        $parent_categories = array_reverse($parent_categories, false);

        // Filter child categories
        $child_categories = array();
        foreach ($categories as $category)
        {
            if ($category->parent == $current_category->id)
            {
                array_push($child_categories, $category);
            }
        }

        $child_categories_id = array();
        foreach($child_categories as $category)
        {
            array_push($child_categories_id, $category->id);
        }

        if ($request->per_page != 100 || $request->per_page != 50)
        {
            $per_page = 2;
        }
        else
        {
            $per_page = $request->per_page;
        }

        // Filter items only from current or child categories
        $items = Item::whereIn('category_id', $child_categories_id)->orWhere('category_id', $current_category->id)->paginate($per_page);

//        $manufacturers = $this->getFilterCategories($items, 'Manufacturer');
//        $colors = $this->getFilterCategories($items, 'Color');
//        $materials = $this->getFilterCategories($items, 'Material');

        return view('category', compact('current_category', 'parent_categories', 'child_categories', 'items', $per_page));
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
