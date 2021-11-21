<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Header, Footer and App styles-->
    @include('layout.partials.head')
    <link href="{{URL::asset('css/category.css')}}" rel="stylesheet">
</head>
<body>

<!--Header-->
@include('layout.partials.header')

<div id="grid">

{{--    <div id="sidebar">--}}
    <form id="sidebar">
        <div id="big">
            <div class="filter_block">
                <label class="category_title">Price:</label>
                <input type="text" placeholder="0.01" id="min_price">
                <label class="no_break"> - </label>
                <input type="text" placeholder="999.99" id="max_price">
            </div>
            <div class="filter_block">
                <label class="category_title">Manufacturer:</label>
{{--                @foreach ($manufacturers as $manufacturer)--}}
{{--                    <input type="checkbox" name="action" id="{{$manufacturer}}">--}}
{{--                    <label for="{{$manufacturer}}">{{$manufacturer}}</label>--}}
{{--                @endforeach--}}
                <input type="checkbox" name="action" id="abc_inc">
                <label for="abc_inc">abc_inc</label>
                <input type="checkbox" name="action" id="makers">
                <label for="makers">makers</label>
                <input type="checkbox" name="action" id="creators">
                <label for="creators">creators</label>
                <input type="checkbox" name="action" id="aaasus">
                <label for="aaasus">aaasus</label>
            </div>
            <div class="filter_block">
                <label class="category_title">Color:</label>
{{--                @foreach ($colors as $color)--}}
{{--                    <input type="checkbox" name="action" id="{{$color}}">--}}
{{--                    <label for="{{$color}}">{{$color}}</label>--}}
{{--                @endforeach--}}
                <input type="checkbox" name="action" id="white">
                <label for="white">white</label>
                <input type="checkbox" name="action" id="black">
                <label for="black">black</label>
                <input type="checkbox" name="action" id="orange">
                <label for="orange">orange</label>
                <input type="checkbox" name="action" id="magenta">
                <label for="magenta">magenta</label>
            </div>
            <div class="filter_block">
                <label class="category_title">Material:</label>
{{--                @foreach ($materials as $material)--}}
{{--                    <input type="checkbox" name="action" id="{{$material}}">--}}
{{--                    <label for="{{$material}}">{{$material}}</label>--}}
{{--                @endforeach--}}
                <input type="checkbox" name="action" id="metal">
                <label for="metal">metal</label>
                <input type="checkbox" name="action" id="aluminium">
                <label for="aluminium">aluminium</label>
                <input type="checkbox" name="action" id="copper">
                <label for="copper">copper</label>
            </div>
            <div class="filter_block">
                <label class="category_title">Volume:</label>
                <input type="text" placeholder="0.01" id="min_volume">
                <label class="no_break"> - </label>
                <input type="text" placeholder="999.99" id="max_volume">
            </div>
            <button>Apply</button>
{{--            <div class="button_block">--}}
{{--                <input type=button value="Apply">--}}
{{--            </div>--}}
        </div>

        <div id="smol">

        </div>
    </form>
{{--    </div>--}}


    <div id="main">
        <nav id="categories_path">
            <a href="/"><h3 class="c_path">Home</h3></a>
            @foreach ($parent_categories as $category)
                <h3>>></h3>
                <a href="/category/{{$category->id}}"><h3 class="c_path">{{$category->name}}</h3></a>
            @endforeach
            @if($current_category)
            <h3>>></h3>
            <a href="/category/{{$current_category->id}}"><h3 class="c_path">{{$current_category->name}}</h3></a>
            @endif
        </nav>

        <div id="categories">
            @foreach ($child_categories as $category)
                <a href="/category/{{$category->id}}">
                    <span class="category">
                        <h2>{{$category->name}}</h2>
                    </span>
                </a>
            @endforeach
        </div>

        <div id="sorting">
            <div id="sort">
                <h2>Order by: </h2>
                <a href="category"><h3 class="s" style="font-weight:100;">cheapest</h3></a>
                <a href="category"><h3 class="s" style="font-weight:100;">expensive</h3></a>
                <a href="category"><h2 class="s" style="font-weight:900;">best selling first</h2></a>
            </div>

            <div id="order">
                <h2>per page: </h2>
                <a href="{{URL::current()."?per_page=20"}}"><h3 class="o" style="font-weight:100;">20</h3></a>
                <h2>/</h2>
                <a href="{{URL::current()."?per_page=50"}}"><h3 class="o" style="font-weight:100;">50</h3></a>
                <h2>/</h2>
                <a href="{{URL::current()."?per_page=100"}}"><h2 class="o" style="font-weight:900;">100</h2></a>
            </div>
        </div>

        <div id="items">

            @foreach ($items as $item)
                <div class="item">
                    <a href="/item/{{$item->id}}">
                    <span class="item_image">
                        <img src="{{URL::asset('images/items_200/' . $item->id . '.jpg')}}" alt={{$item->name}}
                            srcset="{{URL::asset('images/items_100/' . $item->id . '.jpg')}} 100w,
                            {{URL::asset('images/items_200/' . $item->id . '.jpg')}} 200w"
                            sizes="(min-width: 850px) 200px, 100px">
                    </span>
                    </a>
                    <a href="/item/{{$item->id}}">
                    <span class="item_text">
                        <h2>{{$item->name}}</h2>
                        @if (strlen($item->description) > 200)
                            <label>{{substr($item->description, 0, 200)}}...</label>
                        @else
                            <label>{{$item->description}}</label>
                        @endif

                    </span>
                    </a>
                    <div class="item_buy">
                        <div class="text_grid">
                            @php
                                $new_price = round($item->price / 100 * (100 - $item->sale), 2);
                            @endphp

                            <h2>{{$new_price}} €</h2>
                            @if($new_price != $item->price)
                                <s>{{$item->price}} €</s>
                            @endif
                        </div>
                        <div class="button_grid">
                            <input type=button value="Add to cart">
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- @for($i = 0; $i < 7; $i++)
                <div class="item">
                    <a href="item">
                    <span class="item_image">
                        <img src="{{URL::asset('icons/items/brakepads_200.jpg')}}" alt="brakepads"
                             srcset="{{URL::asset('icons/items/brakepads_100.jpg')}} 100w,
                             {{URL::asset('icons/items/brakepads_200.jpg')}} 200w"
                             sizes="(min-width: 850px) 200px, 100px">
                    </span>
                    </a>
                    <a href="item">
                    <span class="item_text">
                        <h2>BRUMBO FRONT VENTED BRAKE DISCS - 291MM DIAMETER</h2>
                    <label>Brand -	BRUMBO, Height [mm] -	39.5, Fitting Position	- Front Axle, Diameter [mm] -	291, Brake Disc Type -	Solid, Brake Disc Thickness [mm]	- 10, Minimum Thickness [mm]	- 8, Number of...</label>
                    </span>
                    </a>
                    <div class="item_buy">
                        <div class="text_grid">
                            <h2>192.90 €</h2>
                            <s>220.50 €</s>
                        </div>
                        <div class="button_grid">
                            <input type=button value="Add to cart">
                        </div>
                    </div>
                </div>
            @endfor --}}

        </div>

        <div id="pageing_parent">
            <nav id="pageing">
{{--                <label>Page: </label>--}}
                {{$items->links('pagination::bootstrap-4')}}
            </nav>
        </div>
    </div>

</div>


<!--Footer-->
@include('layout.partials.footer')

</body>
</html>
