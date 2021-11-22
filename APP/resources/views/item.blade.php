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
        <a href="{{ route('home') }}"><h3 class="c_path">Home</h3></a>
        @foreach ($parent_categories as $category)
            <h3>>></h3>
            <a href="{{ route('category.show', ['id' => $category->id]) }}"><h3 class="c_path">{{$category->name}}</h3></a>
        @endforeach
        <h3>>></h3>
        <a href="{{ route('category.show', ['id' => $current_category->id]) }}"><h3 class="c_path">{{$current_category->name}}</h3></a>
    </nav>
</div>

<div id="top">
    <div id="item_image">
        <img src="{{URL::asset('images/items_500/' . $item->id . '.jpg')}}" alt={{$item->name}}
             srcset="{{URL::asset('images/items_500/' . $item->id . '.jpg')}} 500w,
            {{URL::asset('images/items_200/' . $item->id . '.jpg')}} 200w"
             sizes="(min-width: 600px) 500px, 200px">
    </div>
    <div id="item_title">
        <h1>{{$item->name}}</h1>
    </div>
    <div id="buttons">
        <h1>{{$item->new_price}} €</h1>
        @if($item->new_price != $item->old_price)
            <s>{{$item->old_price}} €</s>
        @endif
        <form action="{{ route('cart.add.quantity', ['id' => $item->id]) }}" method="POST">
            @csrf
            <label for="item_amount">Amount:</label>
            <input type="number" min="1" max="1000" id="item_amount" name="item_amount" value="1">
            <button type="submit">Add to cart</button>
        </form>
    </div>
</div>

<div id="description">
    <h2>Description</h2>
    <label>{{$item->description}}</label>
</div>

<div id="contents">
    <h2>Product info:</h2>

    <table>
        @php
            $item_info_json = json_decode($item->info_json);
        @endphp
        @foreach ($item_info_json as $key=>$value)
            <tr>
                <td>{{$key}}</td>
                <td>{{$value}}</td>
            </tr>
        @endforeach
    </table>
</div>

<!--Footer-->
@include('layout.partials.footer')

</body>
</html>
