<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Header, Footer and App styles-->
    @include('layout.partials.head')
    <link href="{{URL::asset('css/cart.css')}}" rel="stylesheet">
</head>
<body>

<!--Header-->
@include('layout.partials.header')

<!--Order process-->
<div id="order_process">
    <h3 class="content">Confirm cart contents </h3>
    <h3 class="shipping">/ Shipping </h3>
    <h3 class="payment">/ Payment</h3>
</div>


<div id="grid">
    <div id="items">
{{--        @foreach($order->order_items as $order_item)--}}
        @for($i = 0; $i < 3; $i++)
        <div class="item">
{{--            <a href="item/{{$order_item->item->id}}">--}}
            <a href="item">
                <span class="item_image">
                    <img src="{{URL::asset('icons/items/brakepads_200.jpg')}}" alt="brakepads"
                         srcset="{{URL::asset('icons/items/brakepads_100.jpg')}} 100w,
                    {{URL::asset('icons/items/brakepads_200.jpg')}} 200w"
                         sizes="(min-width: 850px) 200px,
                            100px">
                </span>
            </a>
{{--            <a href="item/{{$order_item->item->id}}">--}}
            <a href="item">
                <span class="item_text">
{{--                    <h2>{{$order_item->item->name}}</h2>--}}
                    <h2>BRUMBO FRONT VENTED BRAKE DISCS - 291MM DIAMETER</h2>
{{--                <label>{{$order_item->item->label}}</label>--}}
                <label>Brand -	BRUMBO, Height [mm] -	39.5, Fitting Position	- Front Axle, Diameter [mm] -	291, Brake Disc Type -	Solid, Brake Disc Thickness [mm]	- 10, Minimum Thickness [mm]	- 8, Number of...</label>
                </span>
            </a>
            <div class="item_buy">
                <div class="text_grid">
{{--                    <h2>{{$order_item->item->price}} €</h2>--}}
                    <h2>192.90 €</h2>
{{--                    <s>{{$order_item->item->old_price}} €</s>--}}
                    <s>220.50 €</s>
                </div>
                <div class="button_grid">
                    <input type=button value="-">
{{--                    <label class="item_count">{{$$order_item->amount}}</label>--}}
                    <label class="item_count">1</label>
                    <input type=button value="+">
                    <img class="delete" src="{{URL::asset('icons/delete_smol.png')}}" alt="remove">
                </div>
            </div>
        </div>
        @endfor
    </div>

    <div id="buttons">
        <h2>Total:</h2>
{{--        <h2>{{$order->price}} €</h2>--}}
        <h2>12345.67 €</h2>
        <a href="shipping">
            <button>Continue to shipping</button>
        </a>
    </div>
</div>


<!--Footer-->
@include('layout.partials.footer')


</body>
</html>
