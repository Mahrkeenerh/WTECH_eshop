<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('payment');
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
        if (!session()->has('cart') || !session()->has('shippingInfo') || $request->payment_option == null)
        {
            return redirect()->route('home');
        }
        $cart = session()->get('cart');
        $shippingInfo = session()->get('shippingInfo');
        $shippingInfo->addPaymentOption($request->payment_option);

        if (Auth::user())
        {
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'shipping_type' => $shippingInfo->shippingOption,
                'shipping_price' => $shippingInfo->shippingPrice,
                'payment_type' => $shippingInfo->paymentOption
            ]);
        }
        else
        {
            $user = User::create([
                'first_name' => $shippingInfo->first_name,
                'last_name' => $shippingInfo->last_name,
                'email' => $shippingInfo->email,
                'state' => $shippingInfo->state,
                'city' => $shippingInfo->city,
                'street_and_number' => $shippingInfo->street_and_number,
                'postal_code' => $shippingInfo->postal_code,
            ]);

            $order = Order::create([
                'user_id' => $user->id,
                'shipping_type' => $shippingInfo->shippingOption,
                'shipping_price' => $shippingInfo->shippingPrice,
                'payment_type' => $shippingInfo->paymentOption
            ]);
        }
        foreach ($cart->items as $storedItem)
        {
            OrderItem::create([
                'order_id' => $order->id,
                'amount' => $storedItem['qty'],
                'unit_price' => $storedItem['price'],
                'item_id' => $storedItem['item']->id
            ]);
        }

        session()->flush();

        return redirect()->route('home');
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
