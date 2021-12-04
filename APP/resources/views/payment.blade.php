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
    <h3 class="content"><a href="{{ route('cart') }}">Confirm cart contents </a></h3>
    <h3 class="shipping"><a href="{{ route('shipping') }}">/ Shipping </a></h3>
    <h3 class="payment">/ Payment</h3>
</div>


        <form id="content" action="{{ route('payment.finish') }}" method="POST">
            @csrf
    <!--Payment method-->
    <div id="payment_options">
            <fieldset>
                <legend>Payment method:</legend>
                <p>
                    <label for="payment_card">Debit card</label>
                    <label for="payment_card" class="price">0.00€</label>
                    <input type="radio" id="payment_card" name="payment_option" value="debit_card" required>
                </p>
                <p>
                    <label for="payment_cash">Cash on delivery</label>
                    <label for="payment_cash" class="price">3.50€</label>
                    <input type="radio" id="payment_cash" name="payment_option" value="cash" required>
                </p>
                <p>
                    <label for="payment_account">Transfer to account</label>
                    <label for="payment_account" class="price">0.50€</label>
                    <input type="radio" id="payment_account" name="payment_option" value="account_transfer" required>
                </p>

            </fieldset>

        <a href="{{ route('shipping') }}">
            <button id="back">Back</button>
        </a>
    </div>

    <!--Continue to payment-->
    <div id="finish">
        <h2>Total:</h2>
        @if (Auth::user())
            <h2>{{ $total_price}} €</h2>
        @elseif (session()->has('cart'))
            <h2>{{ session()->get('cart')->totalPrice}} €</h2>
        @else
            <h2>0.00 €</h2>
        @endif
        <button id="pay_n_finish">Pay and finish</button>
    </div>
        </form>

<!--Footer-->
@include('layout.partials.footer')

</body>
</html>
