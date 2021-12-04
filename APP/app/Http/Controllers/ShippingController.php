<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\Item;
use App\Models\User;
use App\ShippingInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
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

            return view('shipping');
        }
        // User is logged in -> write to db
        else {
            $cart = \App\Models\Cart::where('user_id', $user->id)->first();
            $contents = json_decode($cart->contents_json, true);
            $items = Item::all();

            $total_price = 0;
            foreach ($contents as $item_id => $amount)
            {
                $item = $items->where('id', $item_id)->first();
                $total_price += $item->new_price * $amount;
            }

            return view('shipping', compact('total_price'));
//            return view('cart', compact('cart', 'contents', 'items', 'total_price'));
        }

//        return view('shipping');
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
        $validated = $request->validate([
            'first_name' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'last_name' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'state' => ['required', 'not_regex:/[0-9]/'],
            'city' => ['required', 'regex:/^[a-zA-Z]+$/'],
            'street_and_num' => 'required',
            'postal_code' => ['required', 'regex:/^[0-9]{5}$/'],
        ],
        [
            'first_name.regex' => 'First name must contain only letters.',
            'last_name.regex' => 'Last name must contain only letters.',
            'state.regex' => 'State can\'t contain digits.',
            'city.regex' => 'City must contain only letters.',
            'postal_code.regex' => 'Postal code must contain 5 digits.',
        ]);

        $user = Auth::user();
        // No user is logged in
        if (is_null($user)) {

            $cart = session()->get('cart');
            $shippingInfo = new ShippingInfo(
                $request->first_name,
                $request->last_name,
                $request->email,
                $request->state,
                $request->city,
                $request->street_and_num,
                $request->postal_code,
                $request->delivery_option
            );
            $cart->setShippingInfo($shippingInfo);

            session()->put('shippingInfo', $shippingInfo);
            session()->put('cart', $cart);

            return redirect()->route('payment');
        }
        else
        {
            $this->setUserShipping($request->delivery_option);

            // update user shipping info
            User::where('id', $user->id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'state' => $request->state,
                'city' => $request->city,
                'street_and_number' => $request->street_and_num,
                'postal_code' => $request->postal_code,
            ]);
            return redirect()->route('payment');
        }
    }


    private function setUserShipping($delivery_option)
    {
        session()->put('shipping_type', $delivery_option);
        switch ($delivery_option)
        {
            case 'goods_delivery':
                session()->put('shipping_price', 3.50);
                break;
            case 'rapids_couriers':
                session()->put('shipping_price', 4.00);
                break;
            case 'national_transport':
                session()->put('shipping_price', 2.90);
                break;
            default:
                session()->put('shipping_price', 0.00);
        }
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
