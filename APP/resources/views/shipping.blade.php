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
    <h3 class="content"><a href="cart">Confirm cart contents </a></h3>
    <h3 class="shipping">/ Shipping </h3>
    <h3 class="payment">/ Payment</h3>
</div>

<div id="content">
    <!--Shipping info-->
    <div id="shipping_info">
        <form>
            <label for="first_name">First name:</label>
{{--            @if($user)--}}
{{--            <input type="text" id="first_name" name="first_name" value="{{$user->first_name}}">--}}
{{--            @endif--}}
            <input type="text" id="first_name" name="first_name">
        </form>
        <form>
            <label for="last_name">Last name:</label>
{{--            @if($user)--}}
            <input type="text" id="last_name" name="last_name">
{{--            <input type="text" id="last_name" name="last_name" value="{{$user->last_name}}">--}}
{{--            @endif--}}
        </form>
        <form>
            <label for="email_address">Email address:</label>
{{--            @if($user)--}}
            <input type="email" id="email_address" name="email_address">
{{--            <input type="email" id="email_address" name="email_address" value="{{$user->email_address}}">--}}
{{--            @endif--}}
        </form>
        <form>
            <label for="state">State:</label>
{{--            @if($user)--}}
            <input type="text" id="state" name="state">
{{--            <input type="text" id="state" name="state" value="{{$user->state}}">--}}
{{--            @endif--}}
        </form>
        <form>
            <label for="city">City:</label>
{{--            @if($user)--}}
            <input type="text" id="city" name="city">
{{--            <input type="text" id="city" name="city" value="{{$user->city}}">--}}
{{--            @endif--}}
        </form>
        <form>
            <label for="street_n_num">Street and number:</label>
{{--            @if($user)--}}
            <input type="text" id="street_n_num" name="street_n_num">
{{--            <input type="text" id="street_n_num" name="street_n_num" value="{{$user->street_n_num}}">--}}
{{--            @endif--}}
        </form>
        <form>
            <label for="postal_code">Postal code:</label>
{{--            @if($user)--}}
            <input type="text" id="postal_code" name="postal_code">
{{--            <input type="text" id="postal_code" name="postal_code" value="{{$user->postal_code}}">--}}
{{--            @endif--}}
        </form>

        <a href="cart">
            <button id="back">Back</button>
        </a>
{{--        @if($user)--}}
        <!--    <button id="Save address">Save address</button>-->
{{--        @else--}}
        <button id="register">Register</button>
{{--        @endif--}}


    </div>

    <!--Delivery option-->
    <div id="delivery_options">
        <form>
            <fieldset>
                <legend>Deliver via:</legend>
                <p>
                    <label for="delivery_1">Goods Delivery</label>
                    <label for="delivery_1" class="price">3.50€</label>
                    <input type="radio" id="delivery_1" name="delivery_option" value="goods_delivery">
                </p>
                <p>
                    <label for="delivery_2">Rapids couriers</label>
                    <label for="delivery_2" class="price">4.00€</label>
                    <input type="radio" id="delivery_2" name="delivery_option" value="rapids_couriers">
                </p>
                <p>
                    <label for="delivery_3">National transporting company</label>
                    <label for="delivery_3" class="price">2.90€</label>
                    <input type="radio" id="delivery_3" name="delivery_option" value="national_transport">
                </p>

            </fieldset>
        </form>
    </div>

    <!--Continue to payment-->
    <div id="continue">
        <h2>Total:</h2>
{{--        <h2>{{$order->price}} €</h2>--}}
        <h2>12345.67 €</h2>
        <a href="payment">
            <button id="continue_to_payment">Continue to payment</button>
        </a>
    </div>
</div>

<!--Footer-->
@include('layout.partials.footer')
</body>
</html>
