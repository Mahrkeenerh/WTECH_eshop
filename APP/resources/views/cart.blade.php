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

@if(Auth::user())
    @if($contents != [])
    <!--Order process-->
    <div id="order_process">
        <h3 class="content">Confirm cart contents </h3>
        <h3 class="shipping">/ Shipping </h3>
        <h3 class="payment">/ Payment</h3>
    </div>

    <div id="grid">
        <div id="items">
            @foreach($contents as $item_id => $amount)
            @php
                $item = $items->where('id', $item_id)->first();
            @endphp
            <div class="item">
                <a href="{{ route('item.show', ['id' => $item_id]) }}">
                    <span class="item_image">
                        <img src="{{URL::asset('images/items_200/'.$item_id.'.jpg')}}" alt="brakepads"
                            srcset="{{URL::asset('images/items_100/'.$item_id.'.jpg')}} 100w,
                        {{URL::asset('images/items_200/'.$item_id.'.jpg')}} 200w"
                            sizes="(min-width: 850px) 200px,
                                100px">
                    </span>
                </a>
                <a href="{{ route('item.show', ['id' => $item_id]) }}">
                    <span class="item_text">
                        <h2>{{$item->name}}</h2>
                    <label>{{$item->description}}</label>
                    </span>
                </a>
                <div class="item_buy">
                    <div class="text_grid">
                        <h2>{{$item->new_price}} €</h2>
                        @if ($item->new_price < $item->old_price)
                        <s>{{$item->old_price}} €</s>
                        @endif
                    </div>
                    <div class="button_grid">
                        <a href="{{ route('cart.remove_one', ['id' => $item_id]) }}">
                            <button>-</button>
                        </a>
                        <label class="item_count">{{$amount}}</label>
                        <a href="{{ route('cart.add', ['id' => $item->id]) }}">
                            <button>+</button>
                        </a>
                        <a class="delete" href="{{ route('cart.remove', ['id' => $item_id]) }}">
                            <img class="delete" src="{{URL::asset('icons/delete_smol.png')}}" alt="remove">
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div id="buttons">
            <h2>Total:</h2>
            <h2>{{$total_price}} €</h2>
            <a href="{{ route('shipping') }}">
                <button>Continue to shipping</button>
            </a>
        </div>
    </div>

    @else
        <h1 id="empty_cart">You have empty cart :'(</h1>
    @endif

@else
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
                    <a href="{{ route('item.show', ['id' => $stored_item['item']->id]) }}">
                        <span class="item_image">
                            <img src="{{URL::asset('images/items_200/'.$stored_item['item']->id.'.jpg')}}" alt="brakepads"
                                srcset="{{URL::asset('images/items_100/'.$stored_item['item']->id.'.jpg')}} 100w,
                            {{URL::asset('images/items_200/'.$stored_item['item']->id.'.jpg')}} 200w"
                                sizes="(min-width: 850px) 200px,
                                    100px">
                        </span>
                    </a>
                    <a href="{{ route('item.show', ['id' => $stored_item['item']->id]) }}">
                        <span class="item_text">
                            <h2>{{$stored_item['item']->name}}</h2>
                        <label>{{$stored_item['item']->description}}</label>
                        </span>
                    </a>
                    <div class="item_buy">
                        <div class="text_grid">
                            <h2>{{$stored_item['item']->new_price}} €</h2>
                            @if ($stored_item['item']->new_price < $stored_item['item']->old_price)
                            <s>{{$stored_item['item']->old_price}} €</s>
                            @endif
                        </div>
                        <div class="button_grid">
                            <a href="{{ route('cart.remove_one', ['id' => $stored_item['item']->id]) }}">
                                <button>-</button>
                            </a>
                            <label class="item_count">{{$stored_item['qty']}}</label>
                            <a href="{{ route('cart.add', ['id' => $stored_item['item']->id]) }}">
                                <button>+</button>
                            </a>
                            <a class="delete" href="{{ route('cart.remove', ['id' => $stored_item['item']->id]) }}">
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
                <a href="{{ route('shipping') }}">
                    <button>Continue to shipping</button>
                </a>
            </div>
        </div>
    @else
        <h1 id="empty_cart">You have empty cart :'(</h1>
    @endif
@endif


<!--Footer-->
@include('layout.partials.footer')


</body>
</html>
