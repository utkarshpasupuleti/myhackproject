<div id="overlay" class="overlay">
    <div class="popup">
        <button id="close-btn" class="close-btn">&times;</button>
        <div id="form-container" class="form-container">
            <!-- Signup Form -->
            <div id="signup-form" class="form">
                @include("home.register")
            </div>

            <!-- Login Form -->
            <div id="login-form" class="form" style="display: none;">
                @include("home.login")
            </div>
        </div>
    </div>
</div>
