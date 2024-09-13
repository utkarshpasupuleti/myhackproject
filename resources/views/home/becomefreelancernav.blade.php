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
