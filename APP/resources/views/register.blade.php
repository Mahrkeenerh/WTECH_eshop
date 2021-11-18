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

<div id="grid">
    <h1>Register</h1>
    <label class="left_label">First name:</label>
    <input type="text" id="first_input">
    <label class="left_label">Last name:</label>
    <input type="text" id="last_input">
    <label class="left_label">Email address:</label>
    <input type="text" id="email_input">
    <label class="left_label">Password:</label>
    <input type="password" id="password_input">
    <label class="left_label">Repeat password:</label>
    <input type="password" id="repeat_password_input">
    <input type="button" id="register_button" value="Register">
</div>

<!--Footer-->
@include('layout.partials.footer')

</body>
</html>
