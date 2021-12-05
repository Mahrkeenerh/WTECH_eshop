<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
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
        $user = Auth::user();
        // No user is logged in
        if (is_null($user)) {

            if(session()->has('cart'))
            {
                if (session()->get('cart')->totalPrice == 0)
                    return redirect()->route('cart');
                else
                    return view('payment');
            }
            else
            {
                return redirect()->route('cart');
            }
        }
        else
        {
            $cart = \App\Models\Cart::where('user_id', $user->id)->first();
            $contents = json_decode($cart->contents_json, true);
            if($contents == []) return redirect()->route('cart');
            $items = Item::all();

            $total_price = 0;
            foreach ($contents as $item_id => $amount)
            {
                $item = $items->where('id', $item_id)->first();
                $total_price += $item->new_price * $amount;
            }
            $total_price += session()->get('shipping_price');

            return view('payment', compact('total_price'));
        }
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
        $user = Auth::user();

        if ($user)
        {
            $cart = \App\Models\Cart::where('user_id', $user->id)->first();
            $contents = json_decode($cart->contents_json, true);
            if($contents == []) { return redirect()->route('cart'); }
            $items = Item::all();

            $order = Order::create([
                'user_id' => $user->id,
                'shipping_type' => session()->get('shipping_type'),
                'shipping_price' => session()->get('shipping_price') + $this->getPaymentPrice($request->payment_option),
                'payment_type' => $request->payment_option
            ]);

            foreach ($contents as $item_id => $amount)
            {
                $item = $items->where('id', $item_id)->first();
                OrderItem::create([
                    'order_id' => $order->id,
                    'amount' => $amount,
                    'unit_price' => $item->new_price,
                    'item_id' => $item_id,
                ]);
            }

            session()->forget('shipping_type');
            session()->forget('shipping_price');

            Cart::where('user_id', $user->id)->update([
                'contents_json' => json_encode(json_decode ("{}"))
            ]);

            return redirect()->route('home');
        }

        else
        {
            if(session()->has('cart'))
            {
                if (session()->get('cart')->totalPrice == 0)
                    return redirect()->route('cart');
            }
            else
            {
                return redirect()->route('cart');
            }

            if (!session()->has('cart') || !session()->has('shippingInfo') || $request->payment_option == null)
            {
                return redirect()->route('home');
            }
            $cart = session()->get('cart');
            $shippingInfo = session()->get('shippingInfo');
            $shippingInfo->addPaymentOption($request->payment_option);

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
                'shipping_price' => $shippingInfo->shippingPrice + $shippingInfo->paymentPrice,
                'payment_type' => $shippingInfo->paymentOption
            ]);

            foreach ($cart->items as $storedItem)
            {
                OrderItem::create([
                    'order_id' => $order->id,
                    'amount' => $storedItem['qty'],
                    'unit_price' => $storedItem['price'],
                    'item_id' => $storedItem['item']->id
                ]);
            }

            session()->forget('cart');
            session()->forget('shippingInfo');

            return redirect()->route('home');
        }
    }

    private function getPaymentPrice($payment_option)
    {
        switch ($payment_option)
        {
            case 'debit_card':
                return 0;
            case 'cash':
                return 3.50;
            case 'account_transfer':
                return 0.50;
            default:
                return 0.00;
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
