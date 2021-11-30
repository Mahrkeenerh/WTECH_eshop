<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Header, Footer and App styles-->
    @include('layout.partials.head')
    <link href="{{URL::asset('css/shipping.css')}}" rel="stylesheet">
</head>
<body>

<!--Header-->
@include('layout.partials.header')

<!--Order process-->
<div id="order_process">
    <h3 class="content"><a href="{{ route('cart') }}">Confirm cart contents </a></h3>
    <h3 class="shipping">/ Shipping </h3>
    <h3 class="payment">/ Payment</h3>
</div>

<!--Shipping info-->
<form id="content" action="{{ route('shipping.store') }}" method="POST">
    @csrf

    <div id="shipping_info">
        <label for="first_name">First name:</label>
        @auth
            <input type="text" id="first_name" name="first_name" required value="{{ Auth::user()->first_name }}">
        @else
            <input type="text" id="first_name" name="first_name" required value="{{ old('first_name') }}">
        @endauth

        <label for="last_name">Last name:</label>
        @auth
            <input type="text" id="last_name" name="last_name" required value="{{ Auth::user()->last_name }}">
        @else
            <input type="text" id="last_name" name="last_name" required value="{{ old('last_name') }}">
        @endauth

        <label for="email_address">Email address:</label>
        @auth
            <input type="email" id="email" name="email" required value="{{ Auth::user()->email }}">
        @else
            <input type="email" id="email" name="email" required value="{{ old('email') }}">
        @endauth

        <label for="state">State:</label>
        @auth
            <input type="text" id="state" name="state" required value="{{ Auth::user()->state }}">
        @else
            <input type="text" id="state" name="state" required value="{{ old('state') }}">
        @endauth

        <label for="city">City:</label>
        @auth
            <input type="text" id="city" name="city" required value="{{ Auth::user()->city }}">
        @else
            <input type="text" id="city" name="city" required value="{{ old('city') }}">
        @endauth

        <label for="street_and_num">Street and number:</label>
        @auth
            <input type="text" id="street_and_num" name="street_and_num" required value="{{ Auth::user()->street_and_number }}">
        @else
            <input type="text" id="street_and_num" name="street_and_num" required value="{{ old('street_and_num') }}">
        @endauth

        <label for="postal_code">Postal code:</label>
        @auth
            <input type="text" id="postal_code" name="postal_code" required value="{{ Auth::user()->postal_code }}">
        @else
            <input type="text" id="postal_code" name="postal_code" required value="{{ old('postal_code') }}">
        @endauth

        <a href="{{ route('cart') }}">
            <button id="back">Back</button>
        </a>
        @auth
            <button id="save">Save</button>
        @else
            <button id="register">Register</button>
        @endauth
    </div>

    <!--Delivery option-->
    <div id="delivery_options">
            <fieldset>
                <legend>Deliver via:</legend>
                <p>
                    <label for="delivery_1">Goods Delivery</label>
                    <label for="delivery_1" class="price">3.50€</label>
                    <input type="radio" id="delivery_1" name="delivery_option" value="goods_delivery" required>
                </p>
                <p>
                    <label for="delivery_2">Rapids couriers</label>
                    <label for="delivery_2" class="price">4.00€</label>
                    <input type="radio" id="delivery_2" name="delivery_option" value="rapids_couriers" required>
                </p>
                <p>
                    <label for="delivery_3">National transporting company</label>
                    <label for="delivery_3" class="price">2.90€</label>
                    <input type="radio" id="delivery_3" name="delivery_option" value="national_transport" required>
                </p>
            </fieldset>
    </div>

    <!--Continue to payment-->
    <div id="continue">
        <h2>Total:</h2>
        @if (session()->has('cart'))
        <h2>{{ session()->get('cart')->totalPrice}} €</h2>
        @else
        <h2>0.00 €</h2>
        @endif
            <button id="continue_to_payment" type="submit">Continue to payment</button>
    </div>

</form>

<div id="errors">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

<!--Footer-->
@include('layout.partials.footer')
</body>
</html>
