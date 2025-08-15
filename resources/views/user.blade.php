<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="https://columnfort.vercel.app/img/freeview__logo.png">
    <title>COLUMNFORT</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>
<body>
    <x-layout.mobile-header />
    <div class="container">
        <x-layout.header />
        <main>
            <div class="main__container">
                <div class="main__container-start">
                    <div class="account">
                        <h1>Account</h1>
                        @if (Auth::check())
                            <div class="account-list">
                                <ul>
                                    <li>username</li>
                                    <li>{{ Auth::user()->username }}</li>
                                </ul>
                                <ul>
                                    <li>user_id</li>
                                    <li>{{ Auth::user()->user_id }}</li>
                                </ul>
                                <ul>
                                    <li>password_setting</li>
                                    <li>click</li>
                                </ul>
                                <ul>
                                    <li>phone_number</li>
                                    <li>{{ Auth::user()->phone_number }}</li>
                                </ul>
                                <ul>
                                    <li>email</li>
                                    <li>{{ Auth::user()->email }}</li>
                                </ul>
                            </div>
                        @else
                            <script>location.href = "{{ url('auth') }}"</script>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Sign out</button>
                    </form>
                </div>
                <div class="bar"></div>
                <div class="main__container-end"></div>
            </div>
        </main>
        <x-layout.footer />
    </div>
</body>
<script src="{{ asset('js/global.js') }}"></script>
</html>