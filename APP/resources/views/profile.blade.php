<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Header, Footer and App styles-->
    @include('layout.partials.head')
    <link href="{{URL::asset('css/profile.css')}}" rel="stylesheet">
</head>
<body>

<!--Header-->
@include('layout.partials.header')

@auth
<form id="info_form" action="{{ route('profile.store') }}" method="POST">
@csrf
<div class="info_container">
    <!--Personal info-->
    <div class="personal_info">
        <h2>Personal information:</h2>
        <div>
            <label for="first_name">First name:</label>
            <input type="text" id="first_name" name="first_name" value="{{Auth::user()->first_name}}">
        </div>
        <div>
            <label for="last_name">Last name:</label>
            <input type="text" id="last_name" name="last_name" value="{{Auth::user()->last_name}}">
        </div>
        <div>
            <label for="email">Email address:</label>
            <input type="email" id="email" name="email" value="{{Auth::user()->email}}">
        </div>

        <button id="change password">Change password</button>
        <a id="admin" href="{{ route('admin') }}" type="button">Admin mode</a>

    </div>

    <!--Shipping address-->
    <div class="shipping">
        <h2>Shipping address:</h2>
        <div>
            <label for="state">State:</label>
            @if (!is_null(Auth::user()->state))
                <input type="text" id="state" name="state" value="{{Auth::user()->state}}">
            @else
                <input type="text" id="state" name="state" value="{{ old('state') }}">
            @endif
        </div>
        <div>
            <label for="city">City:</label>
            @if (!is_null(Auth::user()->state))
                <input type="text" id="city" name="city" value="{{Auth::user()->city}}">
            @else
                <input type="text" id="city" name="city" value="{{ old('city') }}">
            @endif
        </div>
        <div>
            <label for="street_n_num">Street and number:</label>
            @if (!is_null(Auth::user()->state))
                <input type="text" id="street_n_num" name="street_n_num" value="{{Auth::user()->street_and_number}}">
            @else
                <input type="text" id="street_n_num" name="street_n_num" value="{{ old('street_n_num') }}">
            @endif
        </div>
        <div>
            <label for="postal_code">Postal code:</label>
            @if (!is_null(Auth::user()->state))
                <input type="text" id="postal_code" name="postal_code" value="{{Auth::user()->postal_code}}">
            @else
                <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code') }}">
            @endif
        </div>
        <button id="save_address">Save</button>
    </div>

</div>
</form>

<div id="errors">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>

@endauth

<!--Footer-->
@include('layout.partials.footer')

</body>
</html>
