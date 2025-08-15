<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="https://columnfort.vercel.app/img/freeview__logo.png">
    <title>COLUMNFORT</title>
   <link rel="stylesheet" href="{{ asset('css/global.css') }}">
   <link rel="stylesheet" href="{{ asset('css/collection.css') }}">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
</head>
<body>
    <x-layout.mobile-header />
    <div class="container">
        <x-layout.header />
        <main>
            <div class="collection-title">{{ $title }}</div>
            <div class="items-frame">
            @forelse($products as $product)
                <a class="item" href="{{ url('detail?id=' . $product->id) }}">
                    <img src="{{ $product->image ?? '/img/placeholder.png' }}" alt="{{ $product->title }}">
                    <div class="item-info">
                        <div class="item-title">{{ $product->title }}</div>
                        <div class="item-price">{{ number_format($product->price) }}￦</div>
                    </div>
                </a>
            @empty
                <p>No results found.</p>
            @endforelse
            </div>
        </main>
        <x-layout.footer />
    </div>
</body>
<script src="{{ asset('js/collection.js') }}"></script>
<script src="{{ asset('js/global.js') }}"></script>
</html>