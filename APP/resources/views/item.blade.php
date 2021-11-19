<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Header, Footer and App styles-->
    @include('layout.partials.head')
    <link href="{{URL::asset('css/item.css')}}" rel="stylesheet">
</head>
<body>


<!--Header-->
@include('layout.partials.header')

<div id="categories_parent">
    <nav id="categories_path">
        <a href="homepage"><h3 class="c_path">Home</h3></a>
        <h3>>></h3>
        <a href="category"><h3 class="c_path">Car parts</h3></a>
        <h3>>></h3>
        <a href="category"><h3 class="c_path">Braking</h3></a>
        <h3>>></h3>
        <a href="category"><h3 class="c_path">Brake discs</h3></a>
    </nav>
</div>

<div id="top">
    <div id="item_image">
        <img src="{{URL::asset('icons/items/brakepads_500.jpg')}}" alt="brakepads"
             srcset="{{URL::asset('icons/items/brakepads_500.jpg')}} 500w,
            {{URL::asset('icons/items/brakepads_200.jpg')}} 200w"
             sizes="(min-width: 600px) 500px, 200px">
    </div>
    <div id="item_title">
{{--        <h1>{{$item->name}}</h1>--}}
        <h1>BRUMBO FRONT VENTED BRAKE DISCS - 260MM DIAMETER, AIR COOLED EXTRA LONG LIFE COMFORT+</h1>
    </div>
    <div id="buttons">
{{--        <h1>{{$item.price}} €</h1>--}}
        <h1>192.90 €</h1>
{{--        <s>$item.old_price €</s>--}}
        <s>220.50 €</s>
        <div class="middle_buttons">
            <input type=button value="-">
            <label id="item_count">1</label>
            <input type=button value="+">
        </div>
        <div class="add_cart_button">
            <input class="add_button" type=button value="Add to cart">
        </div>
    </div>
</div>

<div id="description">
    <h2>Description</h2>
{{--    <label>{{$item->description}}</label>--}}
    <label>Mounting guide: Lorem ipsum dolor sit. Recommendations: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</label>
</div>

<div id="contents">
    <h2>Product info:</h2>

    <table>
{{--        @foreach($item->info_json as $info)--}}
{{--            <tr>--}}
{{--                <td>{{$info->label}}</td>--}}
{{--                <td>{{$info->value}}</td>--}}
{{--            </tr>--}}
{{--        @endfor--}}
        <tr>
            <td>Brand</td>
            <td>BRUMBO</td>
        </tr>
        <tr>
            <td>Height [mm]</td>
            <td>39.5</td>
        </tr>
        <tr>
            <td>Fitting Position</td>
            <td>Front Axle</td>
        </tr>
        <tr>
            <td>Diameter [mm]</td>
            <td>291</td>
        </tr>
        <tr>
            <td>Brake Disc Type</td>
            <td>Solid</td>
        </tr>
        <tr>
            <td>Brake Disc Thickness [mm]</td>
            <td>10</td>
        </tr>
        <tr>
            <td>Minimum Thickness [mm]</td>
            <td>8</td>
        </tr>
        <tr>
            <td>Number of Holes</td>
            <td>5</td>
        </tr>
        <tr>
            <td>Bolt Hole Circle Ø [mm]</td>
            <td>100</td>
        </tr>
    </table>
</div>

<!--Footer-->
@include('layout.partials.footer')

</body>
</html>
