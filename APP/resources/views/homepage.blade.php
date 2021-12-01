<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Header, Footer and App styles-->
    @include('layout.partials.head')
    <link href="{{URL::asset('css/homepage.css')}}" rel="stylesheet">
</head>
<body>

<!--Header-->
@include('layout.partials.header')
<!--Main categories-->
<div id="main_categories">

    <a href="{{ route('category.show', ['id' => 1]) }}">
        <div class="category">
            <img src="{{URL::asset('icons/homepage/category_car_parts_100.png')}}" alt="Car parts image">
            <label>Car parts</label>
        </div>
    </a>
    <a href="{{ route('category.show', ['id' => 2]) }}">
        <div class="category">
            <img src="{{URL::asset('icons/homepage/category_oils_fluids_100.png')}}" alt="Oils & fluids image">
            <label>Oils & fluids</label>
        </div>
    </a>
    <a href="{{ route('category.show', ['id' => 3]) }}">
        <div class="category">
            <img src="{{URL::asset('icons/homepage/category_filters_100.png')}}" alt="Filters image">
            <label>Filters</label>
        </div>
    </a>
    <a href="{{ route('category.show', ['id' => 4]) }}">
        <div class="category">
            <img src="{{URL::asset('icons/homepage/category_tires_100.png')}}" alt="Car tires image">
            <label>Car tires</label>
        </div>
    </a>
    <a href="{{ route('category.show', ['id' => 5]) }}">
        <div class="category">
            <img src="{{URL::asset('icons/homepage/category_autocosmetics_100.png')}}" alt="Autocosmetics & Accessories image">
            <label>Autocosmetics & Accessories</label>
        </div>
    </a>
</div>

<!--Tabs-->
<div class="tabs">

    <!--Best sellers-->
    <input type="radio" id="best_tab" name="offers_tabs" checked="checked">
    <label for="best_tab">Best seller</label>

    <div class="tab_content">
        <!--Products-->
        <div class="products_container">

            @foreach($best_sellers as $item)
                <div class="product">
                    <img src="{{URL::asset('images/items_100/'.$item->id.'.jpg')}}" alt="Image of product">
                    <a href="{{ route('item.show', ['id' => $item->id]) }}">
                        <label class="product_name" title="{{$item->name}}">{{$item->name}}</label>
                    </a>
                    <label class="product_price">{{$item->new_price}} €</label>
                    @if ($item->new_price < $item->old_price)
                        <s class="old_product_price">{{$item->old_price}} €</s>
                    @else
                        <div></div>
                    @endif
                    <form action="{{ route('cart.add', ['id' => $item->id]) }}" method="GET">
                        <button type="submit">Add to cart</button>
                    </form>
                </div>
            @endforeach

        </div>
    </div>

    <!--New products-->
    <input type="radio" id="new_tab" name="offers_tabs">
    <label for="new_tab">New products</label>

    <div class="tab_content">
        <!--Products-->
        <div class="products_container">

            @foreach($new_products as $item)
                <div class="product">
                    <img src="{{URL::asset('images/items_100/'.$item->id.'.jpg')}}" alt="Image of product">
                    <a href="{{ route('item.show', ['id' => $item->id]) }}">
                        <label class="product_name" title="{{$item->name}}">{{$item->name}}</label>
                    </a>
                    <label class="product_price">{{$item->new_price}} €</label>
                    @if ($item->new_price < $item->old_price)
                        <s class="old_product_price">{{$item->old_price}} €</s>
                    @else
                        <div></div>
                    @endif
                    <form action="{{ route('cart.add', ['id' => $item->id]) }}" method="GET">
                        <button type="submit">Add to cart</button>
                    </form>
                </div>
            @endforeach

        </div>
    </div>

    <!--Top discount-->
    <input type="radio" id="discount_tab" name="offers_tabs">
    <label for="discount_tab">Top discount</label>

    <div class="tab_content">
        <!--Products-->
        <div class="products_container">

            @foreach($top_discount as $item)
                <div class="product">
                    <img src="{{URL::asset('images/items_100/'.$item->id.'.jpg')}}" alt="Image of product">
                    <a href="{{ route('item.show', ['id' => $item->id]) }}">
                        <label class="product_name" title="{{$item->name}}">{{$item->name}}</label>
                    </a>
                    <label class="product_price">{{$item->new_price}} €</label>
                    @if ($item->new_price < $item->old_price)
                        <s class="old_product_price">{{$item->old_price}} €</s>
                    @else
                        <div></div>
                    @endif
                    <form action="{{ route('cart.add', ['id' => $item->id]) }}" method="GET">
                        <button type="submit">Add to cart</button>
                    </form>
                </div>
            @endforeach

        </div>
    </div>

    <!--Season products-->
    <input type="radio" id="season_tab" name="offers_tabs">
    <label for="season_tab">Season products</label>

    <div class="tab_content">
        <!--Products-->
        <div class="products_container">

            @foreach($season_products as $item)
                <div class="product">
                    <img src="{{URL::asset('images/items_100/'.$item->id.'.jpg')}}" alt="Image of product">
                    <a href="{{ route('item.show', ['id' => $item->id]) }}">
                        <label class="product_name" title="{{$item->name}}">{{$item->name}}</label>
                    </a>
                    <label class="product_price">{{$item->new_price}} €</label>
                    @if ($item->new_price < $item->old_price)
                        <s class="old_product_price">{{$item->old_price}} €</s>
                    @else
                        <div></div>
                    @endif
                    <form action="{{ route('cart.add', ['id' => $item->id]) }}" method="GET">
                        <button type="submit">Add to cart</button>
                    </form>
                </div>
            @endforeach

        </div>
    </div>

</div>

<!--Footer-->
@include('layout.partials.footer')

</body>
</html>
