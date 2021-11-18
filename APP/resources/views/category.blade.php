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

    <div id="sidebar">
        <div id="big">
            <div class="filter_block">
                <label class="category_title">Price:</label>
                <input type="text" placeholder="0.01" id="min_price">
                <label class="no_break"> - </label>
                <input type="text" placeholder="999.99" id="max_price">
            </div>
            <div class="filter_block">
                <label class="category_title">Manufacturer:</label>
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
            <div class="button_block">
                <input type=button value="Apply">
            </div>
        </div>

        <div id="smol">

        </div>
    </div>


    <div id="main">
        <nav id="categories_path">
            <a href="homepage"><h3 class="c_path">Home</h3></a>
            <h3>>></h3>
            <a href="category"><h3 class="c_path">Car parts</h3></a>
            <h3>>></h3>
            <a href="category"><h3 class="c_path">Braking</h3></a>
            <h3>>></h3>
            <a href="category"><h3 class="c_path">Brake discs</h3></a>
        </nav>

        <div id="categories">
            <a href="category">
                <span class="category">
                    <h2>Front brake discs</h2>
                </span>
            </a>
            <a href="category">
                <span class="category">
                    <h2>Rear brake discs</h2>
                </span>
            </a>
            @for($i = 0; $i < 8; $i++)
                <a href="category">
                    <span class="category">
                        <h2>Different brake discs</h2>
                    </span>
                </a>
            @endfor
        </div>

        <div id="sorting">
            <div id="sort">
                <h2>Order by: </h2>
                <a href="category"><h3 class="s" style="font-weight:100;">cheapest</h3></a>
                <a href="category"><h3 class="s" style="font-weight:100;">expensive</h3></a>
                <a href="category"><h2 class="s" style="font-weight:900;">top rated</h2></a>
            </div>

            <div id="order">
                <h2>per page: </h2>
                <a href="category"><h3 class="o" style="font-weight:100;">20</h3></a>
                <h2>/</h2>
                <a href="category"><h3 class="o" style="font-weight:100;">50</h3></a>
                <h2>/</h2>
                <a href="category"><h2 class="o" style="font-weight:900;">100</h2></a>
            </div>
        </div>

        <div id="items">

            @for($i = 0; $i < 7; $i++)
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
            @endfor

        </div>

        <div id="pageing_parent">
            <nav id="pageing">
                <label>Page: </label>
                <a href="category"><h3 class="p_path" style="font-weight:100;">1</h3></a>
                <a href="category"><h3 class="p_path" style="font-weight:100;">2</h3></a>
                <a href="category"><h3 class="p_path" style="font-weight:900;">3</h3></a>
                <a href="category"><h3 class="p_path" style="font-weight:100;">4</h3></a>
                <a href="category"><h3 class="p_path" style="font-weight:100;">5</h3></a>
            </nav>
        </div>
    </div>

</div>


<!--Footer-->
@include('layout.partials.footer')

</body>
</html>
