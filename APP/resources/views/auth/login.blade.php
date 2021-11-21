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

<h2>Login</h2>

@if ($errors->any())
        <ul id="errors">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
@endif

<form id="login" method="POST" action="/login">
    @csrf

    <!-- Email Address -->
    <label class="left_label" for="email">Email address:</label>
    <input type="email" id="email" name="email">

    <!-- Password -->
    <label class="left_label" for="password">Password:</label>
    <input type="password" id="password" name="password">

    <!-- Remember Me -->
{{--            <div class="block mt-4">--}}
{{--                <label for="remember_me" class="inline-flex items-center">--}}
{{--                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">--}}
{{--                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                        {{ __('Forgot your password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}

    <label class="forgot_pass"><a href="https://freshsheetmusic.com/media/catalog/product/h/a/harvey_schmidt-try_to_remember-musicnotes_thumbnail.png" class="forgot_pass">Forgot password?</a></label>

    <button type="submit">Login</button>

    <a id="register" href="/register">Don't have an account?</a>
</form>

<!--Footer-->
@include('layout.partials.footer')

</body>
</html>
