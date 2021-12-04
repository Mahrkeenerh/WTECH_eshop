<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\CategoryController;
use App\Models\Item;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        CategoryController::ResetFilters();

        $item_ids = DB::table('order_items')->select(['item_id', DB::raw('sum(amount) as top')])
            ->groupBy('item_id')->orderBy('top', 'desc')->limit(4)->pluck('item_id');

        $best_sellers = DB::table('items')->whereIn('id', $item_ids)->get();


        $new_products = Item::orderBy('id', 'desc')->limit(4)->get();

        $top_discount = DB::table('items')->select(['*', DB::raw('cast(old_price as float) - cast(new_price as float) as discount')])
            ->orderBy('discount', 'desc')->limit(4)->get();


        $temp = Item::get()->count() - 4;
        $temp = $temp == 0 ? 1 : $temp;
        $offset = Carbon::now()->second % $temp;

        $season_products = Item::skip($offset)->limit(4)->get();

        return view('homepage', compact('best_sellers', 'new_products', 'top_discount', 'season_products'));
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
