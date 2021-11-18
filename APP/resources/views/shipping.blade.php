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
            <input type="text" id="first_name" name="first_name">
        </form>
        <form>
            <label for="last_name">Last name:</label>
            <input type="text" id="last_name" name="last_name">
        </form>
        <form>
            <label for="email_address">Email address:</label>
            <input type="email" id="email_address" name="email_address">
        </form>
        <form>
            <label for="state">State:</label>
            <input type="text" id="state" name="state">
        </form>
        <form>
            <label for="city">City:</label>
            <input type="text" id="city" name="city">
        </form>
        <form>
            <label for="street_n_num">Street and number:</label>
            <input type="text" id="street_n_num" name="street_n_num">
        </form>
        <form>
            <label for="postal_code">Postal code:</label>
            <input type="text" id="postal_code" name="postal_code">
        </form>

        <a href="cart">
            <button id="back">Back</button>
        </a>
        <button id="register">Register</button>
        <!--    <button id="Save address">Save address</button>-->

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
