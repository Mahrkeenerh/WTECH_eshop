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

@if($item)
    <form action="{{ route('update.item', ['id' => $item->id]) }}" method="POST" enctype="multipart/form-data">
@else
    <form action="{{ route('create.item') }}" method="POST" enctype="multipart/form-data">
@endif
@csrf
    <div id="inputs">
        <!--Product name-->
        <div class="block">
            <label for="product_name">Product name:</label>
            @if($item)
                <input id="product_name" name="product_name" required value="{{ $item->name }}"/>
            @else
                <input id="product_name" name="product_name" required/>
            @endif
        </div>

        <!--Product price-->
        <div class="block">
            <label for="product_price">Product price:</label>
            @if($item)
                <input id="product_price" name="product_price" required value="{{ $item->new_price }}"/>
            @else
                <input id="product_price" name="product_price" required/>
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
                        <option value="{{ $category->id }}" selected="selected">{{ $category->name }}</option>
                    @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <!--Brands-->
        <div class="block">
            <label for="brands">Choose product brand:</label>
            <select name="brands" id="brands">
                @foreach($brands as $brand)
                    @if($item && str_contains($item->info_json, $brand))
                        <option value="{{ $brand }}" selected="selected">{{ $brand }}</option>
                    @else
                        <option value="{{ $brand }}">{{ $brand }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <!--Colors-->
        <div class="block">
            <label for="colors">Choose product color:</label>
            <select name="colors" id="colors">
                @foreach($colors as $color)
                    @if($item && str_contains($item->info_json, $color))
                        <option value="{{ $color }}" selected="selected">{{ $color }}</option>
                    @else
                        <option value="{{ $color }}">{{ $color }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <!--Materials-->
        <div class="block">
            <label for="materials">Choose product material:</label>
            <select name="materials" id="materials">
                @foreach($materials as $material)
                    @if($item && str_contains($item->info_json, $material))
                        <option value="{{ $material }}" selected="selected">{{ $material }}</option>
                    @else
                        <option value="{{ $material }}">{{ $material }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

    <div id="description">
        <!--Description-->
        <label for="product_description" class="block">Description:</label>
        @if($item)
            <textarea id="product_description" name="product_description" class="block" required rows="10">{{ $item->description }}</textarea>
        @else
            <textarea id="product_description" name="product_description" class="block" required rows="10"></textarea>
        @endif
    </div>

    <div id="images">
        <!--Image-->
        <div class="block">
            <label for="image">Select image:</label>
            @if($item)
                <input type="file" id="image" name="image" accept="image/*">
            @else
                <input type="file" id="image" name="image" accept="image/*" required>
            @endif
        </div>
    </div>

    <div class="block">
        <button type="submit">Submit</button>
        @if($item)
            <a id="delete" href="{{ route('remove.item', ['id' => $item->id]) }}" type="button">Delete</a>
        @else
            <a id="delete" href="{{ route('admin') }}" type="button">Cancel</a>
        @endif
    </div>

</form>


<!--Footer-->
@include('layout.partials.footer')

</body>
</html>
