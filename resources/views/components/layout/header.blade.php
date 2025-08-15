<header>
    <a href="{{ url('/') }}"><div class="header__logo logo"><img src="{{ asset('img/logo.svg') }}" alt=""></div></a>
    <div class="header__nav">
        <ul class="header__nav-start">
            <li><a href="{{ url('season') }}">home</a></li>
            <li><a href="{{ url('collection') }}?id=all">all</a></li>
            <li><a href="#">category</a></li>
            <input type="checkbox" id="search" hidden>
            <li class="search"><input class="search-input" type="text" placeholder="Search"><label for="search"><img class="close-toggle" src="{{ asset('img/Close.svg') }}" alt=""><img class="search-toggle" src="{{ asset('img/Search.svg') }}" alt=""></label><div class="search-btn"><img src="{{ asset('img/Search.svg') }}" alt=""></div></li>
        </ul>
        <ul class="header__nav-end">
            @auth
                <li><a class="button-black-bg-design" href="{{ url('user') }}">My page</a></li>
                <li><a class="header-invisible-button" href="{{ url('auth') }}">Bag</a></li>
            @else
                <li><a class="button-black-bg-design" href="{{ url('auth') }}">Sign in</a></li>
            @endauth
        </ul>
    </div>
    <label for="mobile-menu" class="mobile-menu-bar-label">
        <div class="mobile-menu-bar">
            <img src="{{ asset('img/menu_bar.svg') }}" alt="">
        </div>
    </label>
</header>