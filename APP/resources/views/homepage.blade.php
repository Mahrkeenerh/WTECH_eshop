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

    <a href="category">
        <div class="category">
            <img src="{{URL::asset('icons/homepage/category_car_parts_100.png')}}" alt="Car parts image">
            <label>Car parts</label>
        </div>
    </a>
    <a href="category">
        <div class="category">
            <img src="{{URL::asset('icons/homepage/category_oils_fluids_100.png')}}" alt="Oils & fluids image">
            <label>Oils & fluids</label>
        </div>
    </a>
    <a href="category">
        <div class="category">
            <img src="{{URL::asset('icons/homepage/category_filters_100.png')}}" alt="Filters image">
            <label>Filters</label>
        </div>
    </a>
    <a href="category">
        <div class="category">
            <img src="{{URL::asset('icons/homepage/category_tires_100.png')}}" alt="Car tires image">
            <label>Car tires</label>
        </div>
    </a>
    <a href="category">
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

            @for($i = 0; $i < 5; $i++)
                <div class="product">
                    <img src="{{URL::asset('icons/homepage/category_tires_100.png')}}" alt="Image of product">
                    <a href="item">
                        <label class="product_name" title="FIRD CUSTOMIC FRONT LED HEADLIGHTS">FIRD CUSTOMIC FRONT LED HEADLIGHTS</label>
                    </a>
                    <label class="product_price">59.90 €</label>
                    <s class="old_product_price">105.90 €</s>
                    <button>Add to cart</button>
                </div>
            @endfor

        </div>
    </div>

    <!--New products-->
    <input type="radio" id="new_tab" name="offers_tabs">
    <label for="new_tab">New products</label>

    <div class="tab_content">
        <!--Products-->
        <div class="products_container">

            @for($i = 0; $i < 7; $i++)
                <div class="product">
                    <img src="{{URL::asset('icons/homepage/category_tires_100.png')}}" alt="Image of product">
                    <a href="item">
                        <label class="product_name" title="BRUMBO FRONT VENTED BRAKE DISCS - 291MM DIAMETER">BRUMBO FRONT VENTED BRAKE DISCS - 291MM DIAMETER</label>
                    </a>
                    <label class="product_price">59.90 €</label>
                    <s class="old_product_price">105.90 €</s>
                    <button>Add to cart</button>
                </div>
            @endfor

        </div>
    </div>

    <!--Top discount-->
    <input type="radio" id="discount_tab" name="offers_tabs">
    <label for="discount_tab">Top discount</label>

    <div class="tab_content">
        <!--Products-->
        <div class="products_container">

            @for($i = 0; $i < 4; $i++)
                <div class="product">
                    <img src="{{URL::asset('icons/homepage/category_tires_100.png')}}" alt="Image of product">
                    <a href="item">
                        <label class="product_name" title="TOTUL 5W30 FULLY SYNTHETIC DURATION PRO ENGINE OIL - 1L">TOTUL 5W30 FULLY SYNTHETIC DURATION PRO ENGINE OIL - 1L</label>
                    </a>
                    <label class="product_price">59.90 €</label>
                    <s class="old_product_price">105.90 €</s>
                    <button>Add to cart</button>
                </div>
            @endfor

        </div>
    </div>

    <!--Season products-->
    <input type="radio" id="season_tab" name="offers_tabs">
    <label for="season_tab">Season products</label>

    <div class="tab_content">
        <!--Products-->
        <div class="products_container">

            @for($i = 0; $i < 8; $i++)
                <div class="product">
                    <img src="{{URL::asset('icons/homepage/category_tires_100.png')}}" alt="Image of product">
                    <a href="item">
                        <label class="product_name" title="Glass cleaner 750ml">Glass cleaner 750ml</label>
                    </a>
                    <label class="product_price">59.90 €</label>
                    <s class="old_product_price">105.90 €</s>
                    <button>Add to cart</button>
                </div>
            @endfor

        </div>
    </div>

</div>

<!--Footer-->
@include('layout.partials.footer')

</body>
</html>
