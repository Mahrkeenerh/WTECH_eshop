<?php

namespace App\Http\Controllers;

use Auth;
use App\Cart;
use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // No user is logged in
        if (is_null($user)) {
            $cart = session()->get('cart');

            return view('cart', compact('cart'));
        }
        // User is logged in -> write to db
        else {
            $cart = \App\Models\Cart::where('user_id', $user->id)->first();
            $contents = json_decode($cart->contents_json, true);
            $items = Item::all();

            return view('cart', compact('cart', 'contents', 'items'));
        }
    }

    public function addToCart (Request $request, $id)
    {
        $user = Auth::user();
        // No user is logged in
        if (is_null($user)) {
            $item = Item::find($id);
            $oldCart = session()->has('cart') ? session()->get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->add($item, $item->id);

            session()->put('cart', $cart);
        }
        // User is logged in -> write to db
        else {
            $cart = \App\Models\Cart::where('user_id', $user->id)->first();
            $contents = json_decode($cart->contents_json, true);

            // Item already exists inside cart
            if (in_array($id, array_keys($contents))) {
                $contents[$id] = intval($contents[$id]) + 1;
            }
            else {
                $contents[$id] = 1;
            }

            $cart->update([
                'contents_json' => json_encode($contents)
            ]);
        }
        
        return redirect()->route('cart');
    }

    public function addToCartQuantity (Request $request, $id)
    {
        if ($request->item_amount == null)
        {
            return redirect()->route('item.show', ['id' => $id]);
        }

        $item = Item::find($id);

        $user = Auth::user();
        // No user is logged in
        if (is_null($user)) {
            $oldCart = session()->has('cart') ? session()->get('cart') : null;
            $cart = new Cart($oldCart);

            for($i = 0; $i < $request->item_amount; $i++)
            {
                $cart->add($item, $item->id);
            }

            session()->put('cart', $cart);
        }
        // User is logged in -> write to db
        else {
            $cart = \App\Models\Cart::where('user_id', $user->id)->first();
            $contents = json_decode($cart->contents_json, true);

            // Item already exists inside cart
            if (in_array($id, array_keys($contents))) {
                $contents[$id] = intval($contents[$id]) + $request->item_amount;
            }
            else {
                $contents[$id] = $request->item_amount;
            }

            $cart->update([
                'contents_json' => json_encode($contents)
            ]);
        }
        
        return redirect()->route('cart');
    }

    public function removeFromCart (Request $request, $id)
    {
        $item = Item::find($id);

        $user = Auth::user();
        // No user is logged in
        if (is_null($user)) {
            $oldCart = session()->has('cart') ? session()->get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->remove($item, $id);

            if ($cart->totalQty == 0)
            {
                $cart = null;
            }

            session()->put('cart', $cart);
        }
        // User is logged in -> write to db
        else {
            $cart = \App\Models\Cart::where('user_id', $user->id)->first();
            $contents = json_decode($cart->contents_json, true);

            unset($contents[$id]);

            $cart->update([
                'contents_json' => json_encode($contents)
            ]);
        }
        
        return redirect()->route('cart');
    }

    public function removeOne (Request $request, $id)
    {
        $item = Item::find($id);

        $user = Auth::user();
        // No user is logged in
        if (is_null($user)) {
            $oldCart = session()->has('cart') ? session()->get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->removeOne($item, $id);

            if ($cart->totalQty == 0)
            {
                $cart = null;
            }

            session()->put('cart', $cart);
        }
        // User is logged in -> write to db
        else {
            $cart = \App\Models\Cart::where('user_id', $user->id)->first();
            $contents = json_decode($cart->contents_json, true);

            $contents[$id] -= 1;

            if ($contents[$id] == 0) {
                unset($contents[$id]);
            }

            $cart->update([
                'contents_json' => json_encode($contents)
            ]);
        }
        
        return redirect()->route('cart');
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
