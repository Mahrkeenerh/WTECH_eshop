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
    public function index()
    {
        // return view('category');
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
    public function show($id)
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

        $items = Item::all();
        // Filter items; only from current or child categories
        foreach ($items as $key=>$item)
        {
            if ($this->find_category($child_categories, $item->category_id) == null
                && $item->category_id != $current_category->id)
                {
                    $items->forget($key);
                }
        }

        return view('category', compact('current_category', 'parent_categories', 'child_categories', 'items'));
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
