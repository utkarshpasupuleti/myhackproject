<div class="form-container">
    <p class="title">Sign up</p>
    <form class="form" method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <input type="text" class="input" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>
        @if ($errors->has('name'))
            <span class="text-red-500 text-xs mt-2">{{ $errors->first('name') }}</span>
        @endif

        <!-- Email Address -->
        <input type="email" class="input" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="username">
        @if ($errors->has('email'))
            <span class="text-red-500 text-xs mt-2">{{ $errors->first('email') }}</span>
        @endif

        <!-- Password -->
        <input type="password" class="input" placeholder="Password" name="password" required autocomplete="new-password">
        <div id="password-feedback" class="text-red-500 text-xs mt-2" style="display: none;"></div>
        @if ($errors->has('password'))
            <span class="text-red-500 text-xs mt-2">{{ $errors->first('password') }}</span>
        @endif

        <!-- Confirm Password -->
        <input type="password" class="input" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
        @if ($errors->has('password_confirmation'))
            <span class="text-red-500 text-xs mt-2">{{ $errors->first('password_confirmation') }}</span>
        @endif

        <input type="text" id="signup-redirect" name="redirectAfterLogin" value="/" class="visible">

        <button class="form-btn" type="submit" disabled>Register</button>
    </form>

    <div class="buttons-container">
        <div class="google-login-button">
            <a href="/auth/redirect">
                <span>Sign up with Google</span>
            </a>
        </div>
    </div>
    <p class="sign-up-label">
        Already have an account?
        <a id="login-btn" class="sign-up-link" >Sign in</a>
    </p>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const passwordInput = document.querySelector('input[name="password"]');
        const confirmPasswordInput = document.querySelector('input[name="password_confirmation"]');
        const registerButton = document.querySelector('.form-btn');
        const feedback = document.getElementById('password-feedback');

        // Function to check password validity
        function checkPasswordValidity() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;

            // Define password criteria
            const minLength = 8; // Minimum length
            const hasNumber = /\d/; // At least one number
            const hasSpecialChar = /[!@#$%^&*]/; // At least one special character

            let messages = [];

            // Check conditions
            if (password.length < minLength) {
                messages.push(`Password must be at least ${minLength} characters long.`);
            }
            if (!hasNumber.test(password)) {
                messages.push('Password must contain at least one number.');
            }
            if (!hasSpecialChar.test(password)) {
                messages.push('Password must contain at least one special character.');
            }
            if (password !== confirmPassword) {
                messages.push('Passwords must match.');
            }

            // Update feedback display
            if (messages.length > 0) {
                feedback.style.display = 'block';
                feedback.innerHTML = messages.join('<br>');
                registerButton.disabled = true;
            } else {
                feedback.style.display = 'none';
                registerButton.disabled = false;
            }
        }

        // Event listeners for input fields
        passwordInput.addEventListener('input', checkPasswordValidity);
        confirmPasswordInput.addEventListener('input', checkPasswordValidity);
    });
</script>

<style>
    /*.form-container {*/
    /*    width: 350px;*/
    /*    height: 550px;*/
    /*    background-color: #fff;*/
    /*    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;*/
    /*    border-radius: 10px;*/
    /*    box-sizing: border-box;*/
    /*    padding: 20px 30px;*/
    /*}*/

    .title {
        text-align: center;
        font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
        "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
        margin: 10px 0 30px 0;
        font-size: 28px;
        font-weight: 800;
    }

    .sub-title {
        margin: 0;
        margin-bottom: 5px;
        font-size: 9px;
        font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
        "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
    }

    .form {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: 18px;
        margin-bottom: 15px;
    }

    .input {
        border-radius: 20px;
        border: 1px solid #c0c0c0;
        outline: 0 !important;
        box-sizing: border-box;
        padding: 12px 15px;
    }

    .form-btn {
        padding: 10px 15px;
        font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
        "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
        border-radius: 20px;
        border: 0 !important;
        outline: 0 !important;
        background: teal;
        color: white;
        cursor: pointer;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .form-btn:active {
        box-shadow: none;
    }

    .sign-up-label {
        margin: 0;
        font-size: 10px;
        color: #747474;
        font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
        "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
    }

    .sign-up-link {
        margin-left: 1px;
        font-size: 11px;
        text-decoration: underline;
        text-decoration-color: teal;
        color: teal;
        cursor: pointer;
        font-weight: 800;
    }

    .buttons-container {
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        margin-top: 20px;
        gap: 15px;
    }

    .apple-login-button,
    .google-login-button {
        border-radius: 20px;
        box-sizing: border-box;
        padding: 10px 15px;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px,
        rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
        "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
        font-size: 11px;
        gap: 5px;
    }

    .apple-login-button {
        background-color: #000;
        color: #fff;
        border: 2px solid #000;
    }

    .google-login-button {
        border: 2px solid #747474;
    }

    .apple-icon,
    .google-icon {
        font-size: 18px;
        margin-bottom: 1px;
    }
</style>
