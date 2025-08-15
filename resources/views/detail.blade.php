<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="https://columnfort.vercel.app/img/freeview__logo.png">
    <title>COLUMNFORT</title>
   <link rel="stylesheet" href="{{ asset('css/global.css') }}">
   <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
</head>
<body>
<x-layout.mobile-header />
    <div class="container">
        <x-layout.header />
        <main>
            <div class="item">
                <div class="item-img"><img src="') }}" alt=""></div>
                <div class="item-info">
                    <div class="item-info-top">
                        <div class="item-main-info">
                            <div class="item-title"></div>
                            <div class="item-main-info-center">
                                <div class="item-price"></div>
                                <ul class="size">
                                    <label for="m-xs"><input type="radio" name="m-size" id="m-xs" required hidden><li>xs</li></label>
                                    <label for="m-s"><input type="radio" name="m-size" id="m-s" hidden><li>s</li></label>
                                    <label for="m-m"><input type="radio" name="m-size" id="m-m" hidden><li>m</li></label>
                                    <label for="m-l"><input type="radio" name="m-size" id="m-l" hidden><li>l</li></label>
                                    <label for="m-xl"><input type="radio" name="m-size" id="m-xl" hidden><li>xl</li></label>
                                </ul>
                            </div>
                        </div>
                        <div class="description">description...</div>
                        <ul class="size">
                            <label for="xs"><input type="radio" name="size" id="xs" required hidden><li>xs</li></label>
                            <label for="s"><input type="radio" name="size" id="s" hidden><li>s</li></label>
                            <label for="m"><input type="radio" name="size" id="m" hidden><li>m</li></label>
                            <label for="l"><input type="radio" name="size" id="l" hidden><li>l</li></label>
                            <label for="xl"><input type="radio" name="size" id="xl" hidden><li>xl</li></label>
                        </ul>
                    </div>
                    <div class="item-info-center">
                        <ul class="item-imgs">
                            <li><img src="') }}" alt=""></li>
                            <li><img src="') }}" alt=""></li>
                            <li><img src="') }}" alt=""></li>
                            <li><img src="') }}" alt=""></li>
                        </ul>
                    </div>
                    <div class="item-info-bottom">
                        <button type="submit" class="add-button">add to bag</button>
                        <button type="submit" class="random-button">random!</button>
                    </div>
                </div>
            </div>
        </main>
        <x-layout.footer />
    </div>
</body>
<script src="{{ asset('js/global.js') }}"></script>
<script src="{{ asset('js/detail.js') }}"></script>
</html>