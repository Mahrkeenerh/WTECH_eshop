<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Header, Footer and App styles-->
    @include('layout.partials.head')
    <link href="{{URL::asset('css/login.css')}}" rel="stylesheet">
</head>
<body>

<!--Header-->
@include('layout.partials.header')

<div id="grid">
    <h1>Login</h1>
    <label class="left_label">Email address:</label>
    <input type="text" id="email_input">
    <label class="left_label">Password:</label>
    <input type="password" id="password_input">
    <label class="forgot_pass"><a href="https://freshsheetmusic.com/media/catalog/product/h/a/harvey_schmidt-try_to_remember-musicnotes_thumbnail.png" class="forgot_pass">Forgot password?</a></label>
    <input type="button" id="login_button" value="Login">
    <label>Don't have an account?</label>
    <a href="register" class="register_button">
        <input type="button" id="register_button" value="Register">
    </a>
</div>

<!--Footer-->
@include('layout.partials.footer')

</body>
</html>
