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

<div class="info_container">
    <!--Personal info-->
    <div class="personal_info">
        <h2>Personal information:</h2>
        <form>
            <label for="first_name">First name:</label>
            @auth
            <input type="text" id="first_name" name="first_name" value="{{Auth::user()->first_name}}">
            @else
            <input type="text" id="first_name" name="first_name">
            @endauth
        </form>
        <form>
            <label for="last_name">Last name:</label>
            @auth
            <input type="text" id="last_name" name="last_name" value="{{Auth::user()->last_name}}">
            @else
            <input type="text" id="last_name" name="last_name">
            @endauth
        </form>
        <form>
            <label for="email">Email address:</label>
            @auth
            <input type="email" id="email" name="email" value="{{Auth::user()->email}}">
            @else
            <input type="email" id="email" name="email">
            @endauth
        </form>

        <button id="change password">Change password</button>
        <a id="admin" href="{{ route('admin') }}" type="button">Admin mode</a>

    </div>

    <!--Shipping address-->
    <div class="shipping">
        <h2>Shipping address:</h2>
        <form>
            <label for="state">State:</label>
            @auth
            <input type="text" id="state" name="state" value="{{Auth::user()->state}}">
            @else
            <input type="text" id="state" name="state">
            @endauth
        </form>
        <form>
            <label for="city">City:</label>
            @auth
            <input type="text" id="city" name="city" value="{{Auth::user()->city}}">
            @else
            <input type="text" id="city" name="city">
            @endauth
        </form>
        <form>
            <label for="street_n_num">Street and number:</label>
            @auth
            <input type="text" id="street_n_num" name="street_n_num" value="{{Auth::user()->street_and_number}}">
            @else
            <input type="text" id="street_n_num" name="street_n_num">
            @endauth
        </form>
        <form>
            <label for="postal_code">Postal code:</label>
            @auth
            <input type="text" id="postal_code" name="postal_code" value="{{Auth::user()->postal_code}}">
            @else
            <input type="text" id="postal_code" name="postal_code">
            @endauth
        </form>
        <button id="save_address">Save</button>
        <button id="edit_address">Edit</button>
    </div>

</div>

<!--Footer-->
@include('layout.partials.footer')

</body>
</html>
