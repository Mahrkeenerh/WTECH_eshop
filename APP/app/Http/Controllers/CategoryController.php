<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
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
        if (is_null($request->top_searchbar)) {
            $top_searchbar = Session::get('top_searchbar');
        }
        else {
            $top_searchbar = $request->top_searchbar;
            Session::put('top_searchbar', $top_searchbar);
        }
        
        // Sanitize per_page
        if (in_array($request->per_page, array(5, 10, 25)))
        {
            $per_page = $request->per_page;
            Session::put('per_page', $per_page);
        }
        else
        {
            if (is_null(Session::get('per_page'))) {
                $per_page = 5;
                Session::put('per_page', $per_page);
            }
            else {
                $per_page = Session::get('per_page');
            }
        }

        // Sanitize order_by
        if (in_array($request->order_by, array("cheap", "expensive", "id")))
        {
            $order_by = $request->order_by;
            Session::put('order_by', $order_by);
        }
        else
        {
            if (is_null(Session::get('order_by'))) {
                $order_by = "id";
                Session::put('order_by', $order_by);
            }
            else {
                $order_by = Session::get('order_by');
            }
        }

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

        $items = Item::where('name', 'ilike', '%'.$top_searchbar.'%')
            ->orWhere('description', 'ilike', '%'.$top_searchbar.'%')
            ->orWhere('info_json', 'ilike', '%'.$top_searchbar.'%')
            ->orderBy($order_column, $order_type)
            ->paginate($per_page);

        return view('category', compact('items', 'per_page', 'order_by', 'top_searchbar'))
            ->with('current_category', null)
            ->with('parent_categories', array())
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

    public function filter2(Request $request)
    {
        if (is_null($request->top_searchbar)) {
            $top_searchbar = Session::get('top_searchbar');
        }
        else {
            $top_searchbar = $request->top_searchbar;
            Session::put('top_searchbar', $top_searchbar);
        }
        
        // Sanitize per_page
        if (in_array($request->per_page, array(5, 10, 25)))
        {
            $per_page = $request->per_page;
            Session::put('per_page', $per_page);
        }
        else
        {
            if (is_null(Session::get('per_page'))) {
                $per_page = 5;
                Session::put('per_page', $per_page);
            }
            else {
                $per_page = Session::get('per_page');
            }
        }

        // Sanitize order_by
        if (in_array($request->order_by, array("cheap", "expensive", "id")))
        {
            $order_by = $request->order_by;
            Session::put('order_by', $order_by);
        }
        else
        {
            if (is_null(Session::get('order_by'))) {
                $order_by = "id";
                Session::put('order_by', $order_by);
            }
            else {
                $order_by = Session::get('order_by');
            }
        }

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

        $items = Item::where('name', 'ilike', '%'.$top_searchbar.'%')
            ->orWhere('description', 'ilike', '%'.$top_searchbar.'%')
            ->orWhere('info_json', 'ilike', '%'.$top_searchbar.'%')
            ->orderBy($order_column, $order_type)
            ->paginate($per_page);

        return view('category', compact('items', 'per_page', 'order_by', 'top_searchbar'))
            ->with('current_category', null)
            ->with('parent_categories', array())
            ->with('child_categories', array());
    }

    public function filter(Request $request, $id) {

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

        if (is_null($request->top_searchbar)) {
            $top_searchbar = Session::get('top_searchbar');
        }
        else {
            $top_searchbar = $request->top_searchbar;
            Session::put('top_searchbar', $top_searchbar);
        }
        
        // Sanitize per_page
        if (in_array($request->per_page, array(5, 10, 25)))
        {
            $per_page = $request->per_page;
            Session::put('per_page', $per_page);
        }
        else
        {
            if (is_null(Session::get('per_page'))) {
                $per_page = 5;
                Session::put('per_page', $per_page);
            }
            else {
                $per_page = Session::get('per_page');
            }
        }

        // Sanitize order_by
        if (in_array($request->order_by, array("cheap", "expensive", "id")))
        {
            $order_by = $request->order_by;
            Session::put('order_by', $order_by);
        }
        else
        {
            if (is_null(Session::get('order_by'))) {
                $order_by = "id";
                Session::put('order_by', $order_by);
            }
            else {
                $order_by = Session::get('order_by');
            }
        }

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

        Session::put('min_price', $request->min_price);
        Session::put('max_price', $request->max_price);
        Session::put('abc_inc', $request->abc_inc);
        Session::put('makers', $request->makers);
        Session::put('creators', $request->creators);
        Session::put('aaasus', $request->aaasus);
        Session::put('white', $request->white);
        Session::put('black', $request->black);
        Session::put('orange', $request->orange);
        Session::put('magenta', $request->magenta);
        Session::put('metal', $request->metal);
        Session::put('aluminium', $request->aluminium);
        Session::put('copper', $request->copper);

        // $items = Item::whereIn('category_id', $child_categories_id)
        //     ->orWhere('category_id', $current_category->id);
        
        $items = Item::where(function ($query) use ($child_categories_id, $current_category) {
            $query->whereIn('category_id', $child_categories_id)
                ->orWhere('category_id', $current_category->id);
        });

        $where_used = FALSE;
        
        if (Session::has('min_price')) $items = $items->where('new_price', '>=', Session::get('min_price'));
        if (Session::has('max_price')) $items = $items->where('new_price', '<=', Session::get('max_price'));

        if (Session::has('abc_inc')) {
            if ($where_used) $items = $items->orWhere('info_json', 'ilike', '%abc_inc%');
            else {
                $items = $items->where('info_json', 'ilike', '%abc_inc%');
                $where_used = TRUE;
            }
        }
        if (Session::has('makers')) {
            if ($where_used) $items = $items->orWhere('info_json', 'ilike', '%makers%');
            else {
                $items = $items->where('info_json', 'ilike', '%makers%');
                $where_used = TRUE;
            }
        }
        if (Session::has('creators')) {
            if ($where_used) $items = $items->orWhere('info_json', 'ilike', '%creators%');
            else {
                $items = $items = $items->where('info_json', 'ilike', '%creators%');
                $where_used = TRUE;
            }
        }
        if (Session::has('aaasus')) {
            if ($where_used) $items = $items->orWhere('info_json', 'ilike', '%aaasus%');
            else {
                $items = $items->where('info_json', 'ilike', '%aaasus%');
                $where_used = TRUE;
            }
        }

        if (Session::has('white')) {
            if ($where_used) $items = $items->orWhere('info_json', 'ilike', '%white%');
            else {
                $items = $items->where('info_json', 'ilike', '%white%');
                $where_used = TRUE;
            }
        }
        if (Session::has('black')) {
            if ($where_used) $items = $items = $items->orWhere('info_json', 'ilike', '%black%');
            else {
                $items = $items->where('info_json', 'ilike', '%black%');
                $where_used = TRUE;
            }
        }
        if (Session::has('orange')) {
            if ($where_used) $items = $items->orWhere('info_json', 'ilike', '%orange%');
            else {
                $items = $items = $items->where('info_json', 'ilike', '%orange%');
                $where_used = TRUE;
            }
        }
        if (Session::has('magenta')) {
            if ($where_used) $items = $items->orWhere('info_json', 'ilike', '%magenta%');
            else {
                $items = $items->where('info_json', 'ilike', '%magenta%');
                $where_used = TRUE;
            }
        }

        if (Session::has('metal')) {
            if ($where_used) $items = $items->orWhere('info_json', 'ilike', '%metal%');
            else {
                $items = $items->where('info_json', 'ilike', '%metal%');
                $where_used = TRUE;
            }
        }
        if (Session::has('aluminium')) {
            if ($where_used) $items = $items->orWhere('info_json', 'ilike', '%aluminium%');
            else {
                $items = $items->where('info_json', 'ilike', '%aluminium%');
                $where_used = TRUE;
            }
        }
        if (Session::has('copper')) {
            if ($where_used) $items = $items->orWhere('info_json', 'ilike', '%copper%');
            else {
                $items = $items->where('info_json', 'ilike', '%copper%');
                $where_used = TRUE;
            }
        }

        $items = $items->orderBy($order_column, $order_type)->paginate($per_page);
        
        return view('category', compact('current_category', 'parent_categories', 'child_categories', 'items', 'per_page', 'order_by', 'top_searchbar'));
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

        if (is_null($request->top_searchbar)) {
            $top_searchbar = Session::get('top_searchbar');
        }
        else {
            $top_searchbar = $request->top_searchbar;
            Session::put('top_searchbar', $top_searchbar);
        }
        
        // Sanitize per_page
        if (in_array($request->per_page, array(5, 10, 25)))
        {
            $per_page = $request->per_page;
            Session::put('per_page', $per_page);
        }
        else
        {
            if (is_null(Session::get('per_page'))) {
                $per_page = 5;
                Session::put('per_page', $per_page);
            }
            else {
                $per_page = Session::get('per_page');
            }
        }

        // Sanitize order_by
        if (in_array($request->order_by, array("cheap", "expensive", "id")))
        {
            $order_by = $request->order_by;
            Session::put('order_by', $order_by);
        }
        else
        {
            if (is_null(Session::get('order_by'))) {
                $order_by = "id";
                Session::put('order_by', $order_by);
            }
            else {
                $order_by = Session::get('order_by');
            }
        }

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

        // Filter items only from current or child categories
        $items = Item::whereIn('category_id', $child_categories_id)
            ->orWhere('category_id', $current_category->id);
        
        if (Session::has('min_price')) $items = $items->where('new_price', '>=', Session::get('min_price'));
        if (Session::has('max_price')) $items = $items->where('new_price', '<=', Session::get('max_price'));
        if (Session::has('abc_inc')) $items = $items->orWhere('info_json', 'ilike', '%abc_inc%');
        if (Session::has('makers')) $items = $items->orWhere('info_json', 'ilike', '%makers%');
        if (Session::has('creators')) $items = $items->orWhere('info_json', 'ilike', '%creators%');
        if (Session::has('aaasus')) $items = $items->orWhere('info_json', 'ilike', '%aaasus%');
        if (Session::has('white')) $items = $items->orWhere('info_json', 'ilike', '%white%');
        if (Session::has('black')) $items = $items->orWhere('info_json', 'ilike', '%black%');
        if (Session::has('orange')) $items = $items->orWhere('info_json', 'ilike', '%orange%');
        if (Session::has('magenta')) $items = $items->orWhere('info_json', 'ilike', '%magenta%');
        if (Session::has('metal')) $items = $items->orWhere('info_json', 'ilike', '%metal%');
        if (Session::has('aluminium')) $items = $items->orWhere('info_json', 'ilike', '%aluminium%');
        if (Session::has('copper')) $items = $items->orWhere('info_json', 'ilike', '%copper%');
        
        $items = $items->orderBy($order_column, $order_type)->paginate($per_page);

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
