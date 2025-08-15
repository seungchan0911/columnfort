<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="https://columnfort.vercel.app/img/freeview__logo.png">
    <title>COLUMNFORT</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form_change_effect.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" type="image/x-icon">
</head>
<body>
    <x-layout.mobile-header />
    <div class="container">
        <x-layout.header />
        <main>
            <input type="checkbox" id="change" hidden>
            <form method="POST" action="/login">
                <div class="form-frame">
                    @csrf
                    <div class="form-container">
                        <input type="hidden" name="form_type" value="login">
                        <div class="form-start">
                            <h1>Sign in</h1>
                            <div class="input-group">
                                <input type="text" name="user_id" placeholder="user_id" autocomplete="off" required>
                                <input type="password" name="password" placeholder="password" autocomplete="off"r equired>
                            </div>
                            <button type="submit">Sign in</button>
                        </div>
                        @if ($errors->any())
                            <div class="form-error"></div>
                        @endif
                        @if (session('success'))
                            <div class="form-success">
                                {{ session('success') }}
                            </div> 
                        @endif
                        <div class="form-end">
                            <label for="change">Don't have an account?</label>
                        </div>
                    </div>
                    <div class="form-img"></div>
                </div>
            </form>
        </main>
        <x-layout.footer />
    </div>
</body>
<script>
    window.formType = "{{ session('form_type') }}";
    window.registerFailed = {{ session('register_failed') ? 'true' : 'false' }};
    window.formErrors = {!! json_encode($errors->all()) !!};
</script>
<script src="{{ asset('js/auth.js') }}"></script>
<script src="{{ asset('js/global.js') }}"></script>
</html>