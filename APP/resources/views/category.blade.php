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
    @if (!is_null($current_category))
        <form id="sidebar" action="{{ route('category.filter_category', ['id'=>$current_category->id]) }}" method="POST">
    @else
        <form id="sidebar" action="{{ route('category.filter_search') }}" method="POST">
    @endif
    @csrf
        <div id="big">
            <div class="filter_block">
                <label class="category_title">Price:</label>
                @if (Session::has('min_price'))
                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" value={{Session::get('min_price')}} name="min_price" id="min_price">    
                @else
                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" placeholder="0.01" name="min_price" id="min_price">
                @endif
                <label class="no_break"> - </label>
                @if (Session::has('max_price'))
                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" value={{Session::get('max_price')}} name="max_price" id="max_price">    
                @else
                    <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" placeholder="999.99" name="max_price" id="max_price">
                @endif
            </div>
            @foreach ($filters as $filter)
                <div class="filter_block">
                    <label class="category_title" name={{strtolower($filter->name)}}>{{$filter->name}}:</label>
                    @php $values = explode(";", $filter->values); @endphp
                    @foreach ($values as $value)
                        @if (!is_null(Session::get(strtolower($filter->name . $value))))
                            <input type="checkbox" name={{strtolower($filter->name.$value)}} id={{$value}} checked>
                            <label for={{$value}}>{{$value}}</label>
                        @else
                            <input type="checkbox" name={{strtolower($filter->name.$value)}} id={{$value}}>
                            <label for={{$value}}>{{$value}}</label>
                        @endif
                    @endforeach
                </div>
            @endforeach
            <button type="submit">Apply</button>
        </div>

{{--        Nemazat--}}
        <div id="smol">

        </div>
    </form>
{{--    </div>--}}


    <div id="main">
        <nav id="categories_path">
            <a href="{{ route('home') }}"><h3 class="c_path">Home</h3></a>
            @foreach ($parent_categories as $category)
                <h3>>></h3>
                <a href="{{ route('category.show', ['id' => $category->id]) }}"><h3 class="c_path">{{$category->name}}</h3></a>
            @endforeach
            @if($current_category)
            <h3>>></h3>
            <a href="{{ route('category.show', ['id' => $current_category->id]) }}"><h3 class="c_path">{{$current_category->name}}</h3></a>
            @endif
        </nav>

        <div id="categories">
            @foreach ($child_categories as $category)
                <a href="{{ route('category.show', ['id' => $category->id]) }}">
                    <span class="category">
                        <h2>{{$category->name}}</h2>
                    </span>
                </a>
            @endforeach
        </div>

        <div id="sorting">
            <div id="sort">
                <h2>Order by: </h2>
                @if ($order_by == "cheap")
                    <a href="{{URL::current()."?order_by=cheap"}}"><h2 class="s" style="font-weight:900;">cheapest</h2></a>
                @else
                    <a href="{{URL::current()."?order_by=cheap"}}"><h3 class="s" style="font-weight:100;">cheapest</h3></a>
                @endif

                @if ($order_by == "expensive")
                    <a href="{{URL::current()."?order_by=expensive"}}"><h2 class="s" style="font-weight:900;">expensive</h2></a>
                @else
                    <a href="{{URL::current()."?order_by=expensive"}}"><h3 class="s" style="font-weight:100;">expensive</h3></a>
                @endif

                @if ($order_by == "id")
                    <a href="{{URL::current()."?order_by=id"}}"><h2 class="s" style="font-weight:900;">best selling</h2></a>
                @else
                    <a href="{{URL::current()."?order_by=id"}}"><h3 class="s" style="font-weight:100;">best selling</h3></a>
                @endif
            </div>

            <div id="order">
                <h2>per page: </h2>
                @if ($per_page == 5)
                    <a href="{{URL::current()."?per_page=5"}}"><h2 class="o" style="font-weight:900;">5</h2></a>
                @else
                    <a href="{{URL::current()."?per_page=5"}}"><h3 class="o" style="font-weight:100;">5</h3></a>
                @endif

                <h2>/</h2>

                @if ($per_page == 10)
                    <a href="{{URL::current()."?per_page=10"}}"><h2 class="o" style="font-weight:900;">10</h2></a>
                @else
                    <a href="{{URL::current()."?per_page=10"}}"><h3 class="o" style="font-weight:100;">10</h3></a>
                @endif

                <h2>/</h2>

                @if ($per_page == 25)
                    <a href="{{URL::current()."?per_page=25"}}"><h2 class="o" style="font-weight:900;">25</h2></a>
                @else
                    <a href="{{URL::current()."?per_page=25"}}"><h3 class="o" style="font-weight:100;">25</h3></a>
                @endif
            </div>
        </div>

        <div id="items">

            @foreach ($items as $item)
                <div class="item">
                    <a href="{{ route('item.show', ['id' => $item->id]) }}">
                    <span class="item_image">
                        <img src="{{URL::asset('images/items_200/' . $item->id . '.jpg')}}" alt={{$item->name}}
                            srcset="{{URL::asset('images/items_100/' . $item->id . '.jpg')}} 100w,
                            {{URL::asset('images/items_200/' . $item->id . '.jpg')}} 200w"
                            sizes="(min-width: 850px) 200px, 100px">
                    </span>
                    </a>
                    <a href="{{ route('item.show', ['id' => $item->id]) }}">
                    <span class="item_text">
                        <h2>{{$item->name}}</h2>
                        @if (strlen($item->description) > 200)
                            <label>{{substr($item->description, 0, 197)}}...</label>
                        @else
                            <label>{{$item->description}}</label>
                        @endif

                    </span>
                    </a>
                    <div class="item_buy">
                        <div class="text_grid">
                            <h2>{{$item->new_price}} €</h2>
                            @if($item->new_price != $item->old_price)
                                <s>{{$item->old_price}} €</s>
                            @endif
                        </div>
                        <div class="button_grid">
                            <form action="{{ route('cart.add', ['id' => $item->id]) }}" method="GET">
                                <button type="submit">Add to cart</button>
{{--                            <input type=button value="Add to cart">--}}
                            </form>
{{--                            <a href="/cart/add_to_cart/{{$item->id}}">--}}
{{--                                <button>Add to cart</button>--}}
{{--                            </a>--}}
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
