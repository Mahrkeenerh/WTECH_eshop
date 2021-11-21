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

<form id="grid" action="{{route('register')}}" method="POST">
    <h1>Register</h1>
    <label class="left_label" for="first_name">First name:</label>
    <input type="text" id="first_name" name="first_name">
    <label class="left_label" for="last_name">Last name:</label>
    <input type="text" id="last_name">
    <label class="left_label" for="email">Email address:</label>
    <input type="text" id="email" name="email">
    <label class="left_label" for="password">Password:</label>
    <input type="password" id="password" name="password">
    <label class="left_label" for="repeat_password">Repeat password:</label>
    <input type="password" id="repeat_password" name="repeat_password">
    <button type="submit">Register</button>
{{--    <input type="button" id="register_button" value="Register">--}}
</form>

<!--Footer-->
@include('layout.partials.footer')

</body>
</html>
