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

@if($cart)
<!--Order process-->
<div id="order_process">
    <h3 class="content">Confirm cart contents </h3>
    <h3 class="shipping">/ Shipping </h3>
    <h3 class="payment">/ Payment</h3>
</div>


<div id="grid">
    <div id="items">
        @foreach($cart->items as $stored_item)
        <div class="item">
            <a href="item/{{$stored_item['item']->id}}">
                <span class="item_image">
                    <img src="{{URL::asset('images/items_200/'.$stored_item['item']->id.'.jpg')}}" alt="brakepads"
                         srcset="{{URL::asset('images/items_100/'.$stored_item['item']->id.'.jpg')}} 100w,
                    {{URL::asset('images/items_200/'.$stored_item['item']->id.'.jpg')}} 200w"
                         sizes="(min-width: 850px) 200px,
                            100px">
                </span>
            </a>
            <a href="item/{{$stored_item['item']->id}}">
                <span class="item_text">
                    <h2>{{$stored_item['item']->name}}</h2>
                <label>{{$stored_item['item']->label}}</label>
                </span>
            </a>
            <div class="item_buy">
                <div class="text_grid">
                    <h2>{{$stored_item['item']->price}} €</h2>
                    <s>{{$stored_item['item']->old_price/100*$stored_item['item']->sale}} €</s>
                </div>
                <div class="button_grid">
                    <input type=button value="-">
                    <label class="item_count">{{$stored_item['qty']}}</label>
{{--                    <label class="item_count">1</label>--}}
                    <input type=button value="+">
                    <a class="delete" href="/cart/remove_from_cart/{{$stored_item['item']->id}}">
                        <img class="delete" src="{{URL::asset('icons/delete_smol.png')}}" alt="remove">
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div id="buttons">
        <h2>Total:</h2>
        <h2>{{$cart->totalPrice}} €</h2>
{{--        <h2>12345.67 €</h2>--}}
        <a href="shipping">
            <button>Continue to shipping</button>
        </a>
    </div>
</div>
@else
    <h1>Empty cart</h1>
@endif


<!--Footer-->
@include('layout.partials.footer')


</body>
</html>
