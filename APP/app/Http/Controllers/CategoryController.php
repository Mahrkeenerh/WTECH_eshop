<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Models\Item;
use App\Models\Filter;
use App\Models\Category;

class CategoryController extends Controller
{
    private function SetFilters(Request $request) {

        foreach ($request->all() as $key => $value) {
            if ($key != "_token") {
                Session::put(strtolower($key), $value);
            }
        }
    }

    public static function ResetFilters() {

        Session::put('top_searchbar', "");
        Session::put('per_page', 5);
        Session::put('order_by', "id");

        $filters = Filter::all();

        foreach ($filters as $filter) {
            $values = explode(";", $filter->values);

            foreach ($values as $value) {
                Session::put(strtolower($filter->name) . strtolower($value), null);
            }
        }
    }

    private function ClearInput(Request $request) {

        if (!is_null($request->top_searchbar)) {
            Session::put('top_searchbar', $request->top_searchbar);
        }

        if (in_array($request->per_page, array(5, 10, 25)))
        {
            Session::put('per_page', $request->per_page);
        }
        else
        {
            if (is_null(Session::get('per_page'))) {
                Session::put('per_page', 5);
            }
        }

        if (in_array($request->order_by, array("cheap", "expensive", "id")))
        {
            Session::put('order_by', $request->order_by);
        }
        else
        {
            if (is_null(Session::get('order_by'))) {
                Session::put('order_by', "id");
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        self::ClearInput($request);

        $top_searchbar = Session::get('top_searchbar');
        $per_page = Session::get('per_page');
        $order_by = Session::get('order_by');

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

         $items = Item::where(function ($query) use ($top_searchbar) {
            $query->where('name', 'ilike', '%'.$top_searchbar.'%')
                ->orWhere('description', 'ilike', '%'.$top_searchbar.'%')
                ->orWhere('info_json', 'ilike', '%'.$top_searchbar.'%');
            });

        // Apply price
        if (Session::has('min_price')) $items = $items->where('new_price', '>=', Session::get('min_price'));
        if (Session::has('max_price')) $items = $items->where('new_price', '<=', Session::get('max_price'));

        // Apply filters from session
        $filters = Filter::all();

        dump(FALSE);

        foreach ($filters as $filter) {
            $filter_applied = FALSE;
            $values = explode(";", $filter->values);

            foreach ($values as $value) {
                if (!is_null(Session::get(strtolower($filter->name) . strtolower($value)))) {
                    dump(TRUE);
                    if ($filter_applied) {
                        $items = $items->orWhere('info_json', 'ilike', '%' . $value . '%');
                    }
                    else {
                        $items = $items->where('info_json', 'ilike', '%' . $value . '%');
                        $filter_applied = TRUE;
                    }
                }
            }
        }

        $items = $items->orderBy($order_column, $order_type)
            ->paginate($per_page);

        return view('category', compact('items', 'per_page', 'order_by', 'top_searchbar'))
            ->with('current_category', null)
            ->with('parent_categories', array())
            ->with('child_categories', array());
    }

    public function search(Request $request)
    {
        self::ResetFilters();

        $top_searchbar = $request->top_searchbar;
        Session::put('top_searchbar', $top_searchbar);

        return redirect()->route('category');
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

    public function filter_search(Request $request)
    {
        self::SetFilters($request);
        return redirect()->route('category');
    }

    public function filter_category(Request $request, $id) {

        self::SetFilters($request);
        return redirect()->route('category.show', ['id' => $id]);
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
        self::ClearInput($request);

        $top_searchbar = Session::get('top_searchbar');
        $per_page = Session::get('per_page');
        $order_by = Session::get('order_by');

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

        // Filter items only from current or child categories
        $items = Item::where(function ($query) use ($top_searchbar) {
            $query->where('name', 'ilike', '%'.$top_searchbar.'%')
                ->orWhere('description', 'ilike', '%'.$top_searchbar.'%')
                ->orWhere('info_json', 'ilike', '%'.$top_searchbar.'%');
            })->where(function ($query) use ($child_categories_id, $current_category) {
                $query->whereIn('category_id', $child_categories_id)
                    ->orWhere('category_id', $current_category->id);
            }
        );

        // Apply price
        if (Session::has('min_price')) $items = $items->where('new_price', '>=', Session::get('min_price'));
        if (Session::has('max_price')) $items = $items->where('new_price', '<=', Session::get('max_price'));

        // Apply filters from session
        $filters = Filter::all();

        dump(FALSE);

        foreach ($filters as $filter) {
            $filter_applied = FALSE;
            $values = explode(";", $filter->values);

            foreach ($values as $value) {
                if (!is_null(Session::get(strtolower($filter->name) . strtolower($value)))) {
                    dump(TRUE);
                    if ($filter_applied) {
                        $items = $items->orWhere('info_json', 'ilike', '%' . $value . '%');
                    }
                    else {
                        $items = $items->where('info_json', 'ilike', '%' . $value . '%');
                        $filter_applied = TRUE;
                    }
                }
            }
        }

        $items = $items->orderBy($order_column, $order_type)
            ->paginate($per_page);

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
