<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">
    <title>Ripos</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.png">
    @include("home.styles")

    <style>
        /* Ensure the body and html take up the full viewport */
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow-x: hidden; /* Prevent horizontal scrolling */
        }

    </style>
</head>
<body>

@include("home.mainpreloader")
<!-- Main Content (Initially hidden) -->
<div id="main-content" class="hidden-content">
    <!-- Container for Navbar and Search Bar -->
    <div class="header-container">
        @include("home.navbar")
        @include("category.category")
        @include("home.searchbar")
    </div>

{{--    <!-- Unique Card Section -->--}}
    @include("home.herobadge")

    <!-- New Cards Section -->
    @include("home.categorycards")

{{--    <!-- Overlay Popup - Only show if not authenticated -->--}}
    @guest
        @include("home.authpopup")
    @endguest

{{--    <!-- Photo Album Section -->--}}
    @include("home.photoalbum")

{{--    <!-- Video Start -->--}}
{{--    <!-- Video Card Start -->--}}
{{--    @include("home.video")--}}
{{--    <!-- Video Card End -->--}}

{{--    <!-- Testimonial Start -->--}}
{{--    @include("home.testimonials")--}}
{{--    <!-- Testimonial End -->--}}
    @include("home.join")

{{--    <!-- FAQs Section -->--}}
    @include("home.faqs")

    <!-- Footer Section -->
    @include("home.footer")
</div>

<!-- Scripts -->
@include("home.scripts")


<!-- Preloader Script -->


</body>
</html>
