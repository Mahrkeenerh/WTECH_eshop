<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Header, Footer and App styles-->
    @include('layout.partials.head')
    <link href="{{URL::asset('css/register.css')}}" rel="stylesheet">
</head>
<body>

<!--Header-->
@include('layout.partials.header')

<h2>Register</h2>

@if ($errors->any())
    <ul id="errors">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form id="register" method="POST" action="{{ route('register') }}">
    @csrf

    <!-- First name -->
        <label class="left_label" for="first_name">First name:</label>
        <input type="text" id="first_name" name="first_name">

    <!-- Last name -->
        <label class="left_label" for="last_name">Last name:</label>
        <input type="text" id="last_name" name="last_name">

    <!-- Email Address -->
        <label class="left_label" for="email">Email address:</label>
        <input type="text" id="email" name="email">

    <!-- Password -->
        <label class="left_label" for="password">Password:</label>
        <input type="password" id="password" name="password">

    <!-- Confirm Password -->
        <label class="left_label" for="password_confirmation">Repeat password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation">

        <a id="login" href="/login">Already registered?</a>

        <button type="submit">Register</button>
</form>

<!--Footer-->
@include('layout.partials.footer')

</body>
</html>
