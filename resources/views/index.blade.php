<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="https://columnfort.vercel.app/img/freeview__logo.png">
    <title>COLUMNFORT</title>
   <link rel="stylesheet" href="{{ asset('css/global.css') }}">
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
</head>
<body>
    <x-layout.mobile-header />
    <div class="container">
        <x-layout.header />
        <main>
            <div class="intro-logo">
                <img src="{{ asset('img/logo.svg') }}" alt="">
            </div>
            <section class="first-section">
                <div class="sub-title">The Meaning Behind Our Name & Logo</div>
                <div class="section-center">
                    <div class="section-start">
                        <div class="main-title">A Structure,<br>A Shelter<br>COLUMNFORT.</div>
                        <div class="description">
                            “Column”, representing strength and structure. “Fort”, symbolizing safety and protection. Together, they express our vision — building clothing that supports your stance and identity in any environment.
                        </div>
                    </div>
                    <div class="section-end">
                        <img src="{{ asset('img/photo-source1.jpg') }}" alt="">
                    </div>
                </div>
            </section>
            <section class="second-section">
                <div class="sub-title">News</div>
                <div class="section-center">
                    <div class="section-end">
                        <img src="{{ asset('img/photo-source3.jpg') }}" alt="">
                    </div>
                    <div class="section-start">
                        <div class="main-title">Discounts<br>For Students</div>
                        <div class="description">
                            We are holding a discount event for relatively needy students. Student verification is done with a student ID card, etc.
                        </div>
                        <ul class="button-group">
                            <li><a class="button-black-bg-design" href="#">About</a></li>
                            <li><a href="#">Verify student status</a></li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="third-section">
                <div class="sub-title">Material & Craftsmanship</div>
                <div class="section-center">
                    <div class="section-start">
                        <div class="main-title">Built from Intention, Crafted with Precision</div>
                        <div class="description">
                            At COLUMNFORT, every fabric is chosen with purpose.From heavyweight cotton that holds structure, to breathable mesh that adapts to motion —we select each material not for trend, but for function, comfort, and durability.
                        </div>
                    </div>
                    <div class="section-end">
                        <img src="{{ asset('img/photo-source4.jpg') }}" alt="">
                    </div>
                </div>
            </section>
        </main>
        <x-layout.footer />
    </div>
</body>
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/global.js') }}"></script>
</html>