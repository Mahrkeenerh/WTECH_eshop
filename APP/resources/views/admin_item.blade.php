<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car stuff for you</title>
    <link href="{{ URL::asset('css/admin_item.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<!--Header-->
<header>
    <h1 class="eshop_name"><a href="{{ route('home') }}">CAR STUFF 4 U</a></h1>
</header>

<nav>
    @if(!$item)
        <h1 id="head_label">New product</h1>
    @else
        <h1 id="head_label">Change product</h1>
    @endif
    <a id="back" href="{{ route('admin') }}" type="button">Back to all items</a>
</nav>

<form>

    <div id="inputs">
        <!--Product name-->
        <div class="block">
            <label for="product_name">Product name:</label>
            @if($item)
                <input id="product_name" value="{{ $item->name }}"/>
            @else
                <input id="product_name"/>
            @endif
        </div>

        <!--Product price-->
        <div class="block">
            <label for="product_price">Product price:</label>
            @if($item)
                <input id="product_price" value="{{ $item->new_price }}"/>
            @else
                <input id="product_price"/>
            @endif
        </div>
    </div>

    <div id="pickers">
        <!--Category-->
        <div class="block">
            <label for="categories">Choose product's category:</label>
            <select name="categories" id="categories">
                @foreach($categories as $category)
                    @if($item && $item->category_id == $category->id)
                        <option value="{{ $category->name }}" selected="selected">{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->name }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <!--Brands-->
        <div class="block">
            <label for="brands">Choose product brand:</label>
            <select name="brands" id="brands">
                @foreach($brands as $brand)
{{--                    @if($item && $item->brand_id == $brand->id)--}}
{{--                        <option value="{{ $brand }}" selected="selected">{{ $brand->name }}</option>--}}
{{--                    @else--}}
                        <option value="{{ $brand }}">{{ $brand->name }}</option>
{{--                    @endif--}}
                @endforeach
            </select>
        </div>

        <!--Colors-->
        <div class="block">
            <label for="colors">Choose product color:</label>
            <select name="colors" id="colors">
                @foreach($colors as $color)
{{--                    @if($item && $item->color_id == $color->id)--}}
{{--                        <option value="{{ $color }}" selected="selected">{{ $color->name }}</option>--}}
{{--                    @else--}}
                        <option value="{{ $color }}">{{ $color->name }}</option>
{{--                    @endif--}}
                @endforeach
            </select>
        </div>

        <!--Materials-->
        <div class="block">
            <label for="materials">Choose product material:</label>
            <select name="materials" id="materials">
                @foreach($materials as $material)
{{--                    @if($item && $item->material_id == $material->id)--}}
{{--                        <option value="{{ $material->name }}" selected="selected">{{ $material->id }}</option>--}}
{{--                    @else--}}
                        <option value="{{ $material->name }}">{{ $material->id }}</option>
{{--                    @endif--}}
                @endforeach
            </select>
        </div>
    </div>

    <div id="description">
        <!--Description-->
        <label for="product_description" class="block">Description:</label>
        @if($item)
            <textarea id="product_description" class="block">{{ $item->description }}</textarea>
        @else
            <textarea id="product_description" class="block"></textarea>
        @endif
    </div>

    <div id="info">
        <!--Info JSON-->
        <label for="product_info_json" class="block">Product info (key : value):</label>
        @if($item)
            <textarea id="product_info_json" class="block">{{ $item->info_json }}</textarea>
        @else
            <textarea id="product_info_json" class="block"></textarea>
        @endif
    </div>

    <div id="images">
        <!--Image-->
        <div class="block">
            <label for="img_500">Select 500x500 image:</label>
            <input type="file" id="img_500" name="img_500" accept="image/*">
        </div>
        <div class="block">
            <label for="img_200">Select 200x200 image:</label>
            <input type="file" id="img_200" name="img_200" accept="image/*">
        </div>
        <div class="block">
            <label for="img_100">Select 100x100 image:</label>
            <input type="file" id="img_100" name="img_100" accept="image/*">
        </div>
    </div>

    <div class="block">
        <button type="submit">Submit</button>
        <a type="button" id="delete">Delete</a>
    </div>

</form>


<!--Footer-->
@include('layout.partials.footer')

</body>
</html>
