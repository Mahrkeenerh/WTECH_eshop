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
        $top_searchbar = $request->top_searchbar;
        
        // Sanitize per_page
        if (in_array($request->per_page, array(5, 10, 25)))
        {
            $per_page = $request->per_page;
        }
        else
        {
            $per_page = 5;
        }

        // Sanitize order_by
        if (in_array($request->order_by, array("cheap", "expensive", "id")))
        {
            $order_by = $request->order_by;
        }
        else
        {
            $order_by = "id";
        }

        $items = Item::where('name', 'ilike', '%'.$request->top_searchbar.'%')->orWhere('description', 'ilike', '%'.$request->top_searchbar.'%')
            ->orWhere('info_json', 'ilike', '%'.$request->top_searchbar.'%')->paginate($per_page);

        return view('category', compact('items', 'per_page', 'order_by', 'top_searchbar'))->with('current_category', null)->with('parent_categories', array())
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
        // direct childern
        $child_categories = array();
        // any child
        $child_categories_id = array();
        foreach ($categories as $category)
        {
            if ($category->parent == $current_category->id) {
                array_push($child_categories, $category);
                array_push($child_categories_id, $category->id);
            }

            if (in_array($category->parent, $child_categories_id)) {
                array_push($child_categories_id, $category->id);
            }
        }

        $top_searchbar = $request->top_searchbar;
        
        // Sanitize per_page
        if (in_array($request->per_page, array(5, 10, 25)))
        {
            $per_page = $request->per_page;
        }
        else
        {
            $per_page = 5;
        }

        // Sanitize order_by
        if (in_array($request->order_by, array("cheap", "expensive", "id")))
        {
            $order_by = $request->order_by;
        }
        else
        {
            $order_by = "id";
        }

        // Filter items only from current or child categories ->paginate($per_page)

        if ($order_by == "cheap") {
            $order_column = "new_price";
            $order_type = "asc";
        }
        else if ($order_by == "expensive") {
            $order_column = "new_price";
            $order_type = "desc";
        }
        else {
            $order_column = "id";
            $order_type = "asc";
        }

        $items = Item::whereIn('category_id', $child_categories_id)
            ->orWhere('category_id', $current_category->id)
            ->orderBy($order_column, $order_type)
            ->paginate($per_page);

//        $manufacturers = $this->getFilterCategories($items, 'Manufacturer');
//        $colors = $this->getFilterCategories($items, 'Color');
//        $materials = $this->getFilterCategories($items, 'Material');

        return view('category', compact('current_category', 'parent_categories', 'child_categories', 'items', 'per_page', 'order_by', 'top_searchbar'));
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
