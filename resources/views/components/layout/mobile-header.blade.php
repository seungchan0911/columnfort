<input type="checkbox" id="mobile-menu" hidden>
    <div class="mobile-menu">
    <div class="mobile-menu-top">
        <a href="{{ url('/') }}"><div class="header__logo logo"><img src="{{ asset('img/logo.svg') }}" alt=""></div></a>
        <label for="mobile-menu"><div class="mobile-menu-close-btn"><img src="{{ asset('img/Close.png') }}" alt=""></div></label>
    </div>
    <ul class="mobile-menu-nav">
        <li class="mobile-search"><input class="search-input" type="text"><div class="search-btn"><img src="{{ asset('img/Search.svg') }}" alt=""></div></li>
        <li><a href="{{ url('season') }}" class="selected">home</a></li>
        <li><a href="{{ url('collection') }}?id=all">all</a></li>
        <li><a href="#">category</a></li>
    </ul>
    <ul class="header__nav-end">
        @auth
            <li><a class="sign-in" href="{{ url('user') }}">My Page</a></li>
            <li><a class="sign-in" href="{{ url('auth') }}">Bag</a></li>
        @else
            <li><a class="sign-in" href="{{ url('auth') }}">Sign in</a></li>
        @endauth
    </ul>
</div>