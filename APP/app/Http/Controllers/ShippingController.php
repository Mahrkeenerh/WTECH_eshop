<?php

namespace App\Http\Controllers;

use App\Cart;
use App\ShippingInfo;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shipping');
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

        $cart = session()->get('cart');
        $shippingInfo = new ShippingInfo(
            $request->first_name,
            $request->last_name,
            $request->email,
            $request->state,
            $request->city,
            $request->street_and_number,
            $request->postal_code,
            $request->delivery_option
        );
        $cart->setShippingInfo($shippingInfo);

        session()->put('shippingInfo', $shippingInfo);
        session()->put('cart', $cart);

        return redirect()->route('payment');
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
