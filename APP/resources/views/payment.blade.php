<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Header, Footer and App styles-->
    @include('layout.partials.head')
    <link href="{{URL::asset('css/payment.css')}}" rel="stylesheet">
</head>
<body>

<!--Header-->
@include('layout.partials.header')

<!--Order process-->
<div id="order_process">
    <h3 class="content"><a href="cart">Confirm cart contents </a></h3>
    <h3 class="shipping"><a href="shipping">/ Shipping </a></h3>
    <h3 class="payment">/ Payment</h3>
</div>

<div id="content">

    <!--Payment method-->
    <div id="payment_options">
        <form>
            <fieldset>
                <legend>Payment method:</legend>
                <p>
                    <label for="payment_card">Debit card</label>
                    <label for="payment_card" class="price">0.00€</label>
                    <input type="radio" id="payment_card" name="payment_option" value="debit_card">
                </p>
                <p>
                    <label for="payment_cash">Cash on delivery</label>
                    <label for="payment_cash" class="price">3.50€</label>
                    <input type="radio" id="payment_cash" name="payment_option" value="cash">
                </p>
                <p>
                    <label for="payment_account">Transfer to account</label>
                    <label for="payment_account" class="price">0.50€</label>
                    <input type="radio" id="payment_account" name="payment_option" value="account_transfer">
                </p>

            </fieldset>
        </form>

        <a href="shipping">
            <button id="back">Back</button>
        </a>
    </div>

    <!--Continue to payment-->
    <div id="finish">
        <h2>Total:</h2>
{{--        <h2>{{$order->price}} €</h2>--}}
        <h2>12345.67 €</h2>
        <button id="pay_n_finish">Pay and finish</button>
    </div>
</div>

<!--Footer-->
@include('layout.partials.footer')

</body>
</html>
