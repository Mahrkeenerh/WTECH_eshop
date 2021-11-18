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
            <input type="text" id="first_name" name="first_name">
        </form>
        <form>
            <label for="last_name">Last name:</label>
            <input type="text" id="last_name" name="last_name">
        </form>
        <form>
            <label for="email">Email address:</label>
            <input type="email" id="email" name="email">
        </form>

        <button id="change password">Change password</button>

    </div>

    <!--Shipping address-->
    <div class="shipping">
        <h2>Shipping address:</h2>
        <form>
            <label for="state">State:</label>
            <input type="text" id="state" name="state">
        </form>
        <form>
            <label for="city">City:</label>
            <input type="text" id="city" name="city">
        </form>
        <form>
            <label for="street_n_num">Street and number:</label>
            <input type="text" id="street_n_num" name="street_n_num">
        </form>
        <form>
            <label for="postal_code">Postal code:</label>
            <input type="text" id="postal_code" name="postal_code">
        </form>
        <button id="save_address">Save</button>
        <button id="edit_address">Edit</button>
    </div>

</div>

<!--Footer-->
@include('layout.partials.footer')

</body>
</html>
