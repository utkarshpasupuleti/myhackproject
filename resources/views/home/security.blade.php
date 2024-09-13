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
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <style>
        /* Popup overlay styling */
        #popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        /* Popup content styling */
        #popup-content {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            text-align: center;
            position: relative;
        }

        /* Close button styling */
        #popup-close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            border: none;
            background: transparent;
            font-size: 20px;
            cursor: pointer;
        }
        .card-unique {
            overflow: hidden;
            position: relative;
            text-align: left;
            border-radius: 0.5rem;
            max-width: 290px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            background-color: #fff;
        }

        .dismiss-unique {
            position: absolute;
            right: 10px;
            top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.5rem 1rem;
            background-color: #fff;
            color: black;
            border: 2px solid #D1D5DB;
            font-size: 1rem;
            font-weight: 300;
            width: auto;
            height: auto;
            border-radius: 7px;
            transition: .3s ease;
        }

        .dismiss-unique:hover {
            background-color: #ee0d0d;
            border: 2px solid #ee0d0d;
            color: #fff;
        }

        .header-unique {
            padding: 1.25rem 1rem 1rem 1rem;
        }

        .image-unique {
            display: flex;
            margin-left: auto;
            margin-right: auto;
            background-color: #e2feee;
            flex-shrink: 0;
            justify-content: center;
            align-items: center;
            width: 3rem;
            height: 3rem;
            border-radius: 9999px;
            animation: animate-unique .6s linear alternate-reverse infinite;
            transition: .6s ease;
        }

        .image-unique svg {
            color: #0afa2a;
            width: 2rem;
            height: 2rem;
        }

        .content-unique {
            margin-top: 0.75rem;
            text-align: center;
        }

        .title-unique {
            color: #066e29;
            font-size: 1rem;
            font-weight: 600;
            line-height: 1.5rem;
        }

        .message-unique {
            margin-top: 0.5rem;
            color: #595b5f;
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .actions-unique {
            margin: 0.75rem 1rem;
        }

        .history-unique {
            display: inline-flex;
            padding: 0.5rem 1rem;
            background-color: #1aa06d;
            color: #ffffff;
            font-size: 1rem;
            line-height: 1.5rem;
            font-weight: 500;
            justify-content: center;
            width: 100%;
            border-radius: 0.375rem;
            border: none;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .track-unique {
            display: inline-flex;
            margin-top: 0.75rem;
            padding: 0.5rem 1rem;
            color: #242525;
            font-size: 1rem;
            line-height: 1.5rem;
            font-weight: 500;
            justify-content: center;
            width: 100%;
            border-radius: 0.375rem;
            border: 1px solid #D1D5DB;
            background-color: #fff;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        @keyframes animate-unique {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.09);
            }
        }

    </style>

</head>
<body data-spy="scroll" data-target=".fixed-top">

@include("home.becomefreelancernav")

<!--main section -->
<div class="dat-container mt-5">
    <div style="padding-top: 10px"></div>
    <div class="alert alert-warning">
        <p>Now, let’s talk about the things you want to steer clear of. Your success on Ripos is important to us. Avoid the following to keep in line with our community standards:</p>
        <ul>
            <li>Providing any misleading or inaccurate information about your identity.</li>
        </ul>
    </div>
    <!-- Email Verification -->
    <div class="dat-mb-4">
        <h4 class="dat-h4">Email Verification</h4>
        <div class="dat-d-flex justify-content-between align-items-center">
            <span id="email-address">{{ $email }}</span>
            <!-- Conditionally change button text and class based on email verification status -->
            @if($email_verified_at)
                <button id="verify-email" class="dat-btn dat-verified">Verified</button>
            @else
                <a href="/verify-email">
                    <button id="verify-email" class="dat-btn dat-not-verified">Verify</button>
                </a>
            @endif
        </div>
    </div>

    <!-- Phone Verification -->
    <div class="dat-mb-4">
        <h4 class="dat-h4">Phone Verification</h4>
        <div class="dat-d-flex align-items-center">
            <input type="text" id="phone-number" class="dat-form-control dat-flex-grow-1" placeholder="Enter your phone number">
            <button id="receive-code" class="dat-btn dat-not-verified dat-ml-2">get Code</button>
        </div>
        <div id="code-section" class="dat-hidden mt-3">
            <input type="text" id="verification-code" class="dat-form-control mb-2" placeholder="Enter received code">
            <button id="verify-code" class="dat-btn dat-not-verified">Verify Code</button>
        </div>
    </div>

    <!-- Continue Button -->
    <div id="continue-section" class="dat-hidden">
        <button id="continue-btn" class="dat-btn btn-primary">Continue</button>
    </div>
</div>

<!-- Popup Overlay -->
<div id="popup-overlay">
    <div id="popup-content">
{{--        <button id="popup-close-btn">&times;</button>--}}
        <div class="card-unique">
            <button type="button" id="popup-close-btn" class="dismiss-unique">×</button>
            <div class="header-unique">
                <div class="image-unique">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                        <g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path stroke-linejoin="round" stroke-linecap="round" stroke-width="1.5" stroke="#000000" d="M20 7L9.00004 18L3.99994 13"></path>
                        </g>
                    </svg>
                </div>
                <div class="content-unique">
                    <span class="title-unique">Seller account details confirmed  </span>
                    <p class="message-unique">You are now ready to create your gig </p>
                </div>
                <div class="actions-unique">
                    <button type="button" class="track-unique" onclick="createGig()">Create your Gig</button>
                </div>
            </div>
        </div>

    </div>
</div>


@include("home.footer")

<!-- Scripts -->
<script src="https://www.gstatic.com/firebasejs/9.6.0/firebase-app.js" defer></script>
<script src="https://www.gstatic.com/firebasejs/9.6.0/firebase-auth.js" defer> </script>
<script src="js/jquery.min.js" defer></script>
<script src="js/bootstrap.min.js" defer></script>
<script  src="js/custom.js" defer></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var continueButton = document.getElementById('continue-btn');
        var popupOverlay = document.getElementById('popup-overlay');
        var closeButton = document.getElementById('popup-close-btn');

        continueButton.addEventListener('click', function () {
            popupOverlay.style.display = 'flex'; // Show the popup
        });

        closeButton.addEventListener('click', function () {
            popupOverlay.style.display = 'none'; // Hide the popup
        });

        // Optional: Hide the popup if clicking outside of the content
        popupOverlay.addEventListener('click', function (e) {
            if (e.target === popupOverlay) {
                popupOverlay.style.display = 'none';
            }
        });
    });
    function createGig() {
        window.location.href = `/uploadgig?check="accountcheckcomplete"`;
    }
</script>
</body>
</html>
