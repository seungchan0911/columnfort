<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="https://columnfort.vercel.app/img/freeview__logo.png">
    <title>COLUMNFORT</title>
   <link rel="stylesheet" href="{{ asset('css/global.css') }}">
   <link rel="stylesheet" href="{{ asset('css/season.css') }}">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
</head>
<body>
    <x-layout.mobile-header />
    <div class="container">
        <x-layout.header />
        <main>
            <section class="collection no.1">
                <div class="section-center">
                    <div class="season-title">collection no.1</div>
                    <div class="season-sub-title">collection1 message</div>
                    <a href="{{ url('collection') }}?id=collection%20no.1">about</a>
                </div>
            </section>
            <section class="collection no.2">
                <div class="section-center">
                    <div class="season-title">collection no.2</div>
                    <div class="season-sub-title">collection2 message</div>
                    <a href="{{ url('collection') }}?id=collection%20no.2">about</a>
                </div>
            </section>
            <section class="collection no.3">
                <div class="section-center">
                    <div class="season-title">collection no.3</div>
                    <div class="season-sub-title">collection3 message</div>
                    <a href="{{ url('collection') }}?id=collection%20no.3">about</a>
                </div>
            </section>
            <section class="collection no.4">
                <div class="section-center">
                    <div class="season-title">collection no.4</div>
                    <div class="season-sub-title">collection4 message</div>
                    <a href="{{ url('collection') }}?id=collection%20no.4">about</a>
                </div>
            </section>
            <section class="collection no.5">
                <div class="section-center">
                    <div class="season-title">collection no.5</div>
                    <div class="season-sub-title">collection5 message</div>
                    <a href="{{ url('collection') }}?id=collection%20no.5">about</a>
                </div>
            </section>
        </main>        
        <x-layout.footer />
    </div>
</body>
<script src="{{ asset('js/global.js') }}"></script>
</html>