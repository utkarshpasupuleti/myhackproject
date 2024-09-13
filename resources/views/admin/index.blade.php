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
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/gig.css" rel="stylesheet">
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

</head>
<body>
<div class="header-container">
    <!-- Navigation -->
    <!-- Your existing HTML structure -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            <a class="navbar-brand logo-image" href="/"><img src="images/logo.png" alt="alternative"></a>
            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">

                    @guest
                        <!-- For unauthenticated users -->
                        <li class="nav-item">
                            <button class="mysigninbutton" id="join-btn">JOIN</button>
                        </li>
                    @else
                        <!-- For authenticated users -->
                        <li class="nav-item">
                            <a href="/profile">
                                <button class="mynamebutton" id="profile-btn">
                                    {{ $firstLetter }}
                                </button>
                            </a>
                            <span>Profile</span>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>


@include("home.footer")
<!-- Scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>

</body>
</html>

