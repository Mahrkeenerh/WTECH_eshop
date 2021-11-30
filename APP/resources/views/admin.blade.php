<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car stuff for you</title>
    <link href="{{ URL::asset('css/admin.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<!--Header-->
<header>
    <h1 class="eshop_name"><a href="{{ route('home') }}">CAR STUFF 4 U</a></h1>
</header>

<a id="new_product" href="{{ route('create.item') }}">Add new product</a>

<div id="products">

    @foreach($items as $item)
    <div class="product">
        <h3 class="product_name">{{ $item->name }}</h3>
        <img class="product_image" src="{{ URL::asset('images/items_100/' . $item->id . '.jpg') }}" alt="product image">
        <h4 class="product_price">{{ $item->new_price }} €</h4>
        <a class="update" href="{{ route('update.item', ['id' => $item->id]) }}" type="button">Change</a>
        <a class="remove" href="{{ route('remove.item', ['id' => $item->id]) }}" type="button">Delete</a>
    </div>
    @endforeach


</div>

<!--Footer-->
@include('layout.partials.footer')

</body>
</html>
