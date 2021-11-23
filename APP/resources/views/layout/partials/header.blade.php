<header>
    <h1 class="eshop_name"><a href="{{ route('home') }}">CAR STUFF 4 U</a></h1>
    <form class="search_bar" action="{{ route('category.search') }}" method="POST">
        @csrf
        <input type="text" id="top_searchbar" name="top_searchbar" placeholder="I'm looking for..." required>
        <button>Search</button>
    </form>
    <a href="{{ route('cart') }}" class="cart"><img src="{{URL::asset('icons/homepage/shopping_cart_30.png')}}" alt="shopping cart"></a>

    @auth
    <span class="login">
    <h3 style="display: inline; font-size: 0.8em;"><a href="{{ route('profile') }}">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</a></h3>
    <form method="POST" action="{{ route('logout') }}" style="display: inline">
        @csrf
        <button type="submit">Logout</button>
{{--        <x-dropdown-link :href="route('logout')"--}}
{{--                         onclick="event.preventDefault();--}}
{{--                                            this.closest('form').submit();">--}}
{{--            {{ __('Log Out') }}--}}
{{--        </x-dropdown-link>--}}
    </form>
    </span>

    @else
    <h3 class="login"><a href="{{ route('login') }}" type="button">Login</a></h3>
    @endauth
</header>
