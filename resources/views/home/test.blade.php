{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{--    <meta name="description" content="Your description">--}}
{{--    <meta name="author" content="Your name">--}}
{{--    <title>Ripos</title>--}}

{{--    <link rel="preconnect" href="https://fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap" rel="stylesheet">--}}
{{--    <link href="css/bootstrap.css" rel="stylesheet">--}}
{{--    <link href="css/fontawesome-all.css" rel="stylesheet">--}}
{{--    <link href="css/styles.css" rel="stylesheet">--}}
{{--    <link href="css/custom.css" rel="stylesheet">--}}
{{--    <link rel="icon" href="images/favicon.png">--}}
{{--    <link rel="stylesheet" href="css/owl.carousel.min.css">--}}
{{--    <link rel="stylesheet" href="css/owl.theme.default.min.css">--}}
{{--    <style>--}}
{{--        /* styles.css */--}}

{{--        body {--}}
{{--            font-family: Arial, sans-serif;--}}
{{--            line-height: 1.6;--}}
{{--            margin: 0;--}}
{{--            padding: 0;--}}
{{--            background-color: #f4f4f4;--}}
{{--        }--}}

{{--        #thum-container {--}}
{{--            max-width: 1200px;--}}
{{--            margin: 0 auto;--}}
{{--            padding-top: 50px;--}}
{{--        }--}}

{{--        #thum-header {--}}
{{--            text-align: center;--}}
{{--            background: #333;--}}
{{--            color: #fff;--}}
{{--            padding: 20px 0;--}}
{{--            border-bottom: 5px solid #f1eeea;--}}
{{--        }--}}

{{--        #thum-header h1 {--}}
{{--            margin: 0;--}}
{{--        }--}}

{{--        #thum-main-content {--}}
{{--            display: flex;--}}
{{--            gap: 20px;--}}
{{--            flex-wrap: nowrap;--}}
{{--        }--}}

{{--        #thum-profile {--}}
{{--            flex: 60%;--}}
{{--        }--}}


{{--        #thum-packages {--}}
{{--            flex: 40%;--}}
{{--            position: -webkit-sticky; /* For Safari */--}}
{{--            position: sticky;--}}
{{--            top: 20px; /* Distance from the top of the viewport */--}}
{{--            background:transparent; /* Ensure the background matches the main content */--}}
{{--            padding: 20px; /* Add some padding for better spacing */--}}
{{--            border-radius: 8px; /* Round corners for a polished look */--}}
{{--            box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Add shadow for better visibility */--}}
{{--            z-index: 1; /* Ensure it's above other content */--}}
{{--            height: 50vh; /* Make it take full viewport height */--}}
{{--            color: black;--}}
{{--        }--}}
{{--        .thum-card {--}}
{{--            background: #fff;--}}
{{--            border-radius: 8px;--}}
{{--            box-shadow: 0 4px 8px rgba(0,0,0,0.1);--}}
{{--            overflow: hidden;--}}
{{--            margin-bottom: 20px;--}}
{{--        }--}}

{{--        .thum-card-body {--}}
{{--            padding: 15px;--}}
{{--        }--}}

{{--        .icon-list {--}}
{{--            list-style: none;--}}
{{--            padding: 0;--}}
{{--            margin: 0;--}}
{{--            display: flex;--}}
{{--            gap: 20px; /* Adjust spacing between items */--}}
{{--        }--}}

{{--        .icon-list li {--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--        }--}}

{{--        .icon-list i {--}}
{{--            margin-right: 10px; /* Space between icon and text */--}}
{{--            color: #f1e9dd; /* Icon color */--}}
{{--        }--}}


{{--        .thum-card:hover {--}}
{{--            transform: translateY(-10px);--}}
{{--            box-shadow: 0 8px 16px rgba(0,0,0,0.2);--}}
{{--        }--}}



{{--        .thum-card-body {--}}
{{--            padding: 15px;--}}
{{--        }--}}

{{--        .thum-profile-details {--}}
{{--            display: flex;--}}
{{--            gap: 20px;--}}
{{--            margin-bottom: 20px;--}}
{{--        }--}}

{{--        .thum-mini-card {--}}
{{--            background: #f9f9f9;--}}
{{--            border: 1px solid #ddd;--}}
{{--            border-radius: 4px;--}}
{{--            padding: 10px;--}}
{{--            box-shadow: 0 2px 4px rgba(0,0,0,0.1);--}}
{{--            flex: 1;--}}
{{--        }--}}

{{--        #thum-profile video {--}}
{{--            width: 100%;--}}
{{--            border-radius: 4px;--}}
{{--        }--}}

{{--        #thum-package-nav {--}}
{{--            display: flex;--}}
{{--            gap: 10px;--}}
{{--            margin-bottom: 20px;--}}
{{--            color: black;--}}
{{--        }--}}

{{--        .thum-toggle-btn {--}}
{{--            flex: 1;--}}
{{--            padding: 10px;--}}
{{--            background: #dfddd9;--}}
{{--            border: none;--}}
{{--            color: #fff;--}}
{{--            text-align: center;--}}
{{--            cursor: pointer;--}}
{{--            border-radius: 4px;--}}
{{--            margin: 0;--}}
{{--            color: black;--}}

{{--        }--}}

{{--        .thum-toggle-btn:hover {--}}
{{--            background: #e8e2dd;--}}
{{--        }--}}

{{--        #thum-package-content {--}}
{{--            background: #fff;--}}
{{--            border: 1px solid #ddd;--}}
{{--            border-radius: 8px;--}}
{{--            padding: 15px;--}}
{{--            box-shadow: 0 4px 8px rgba(0,0,0,0.1);--}}
{{--        }--}}

{{--        .thum-package-details {--}}
{{--            display: none;--}}
{{--        }--}}

{{--        #thum-basic {--}}
{{--            display: block;--}}
{{--        }--}}

{{--        @media (max-width: 768px) {--}}
{{--            #thum-main-content {--}}
{{--                flex-direction: column;--}}
{{--            }--}}
{{--        }--}}
{{--        @media (max-width: 768px) {--}}
{{--            #thum-main-content {--}}
{{--                flex-direction: column;--}}
{{--            }--}}

{{--            #thum-packages {--}}
{{--                position: static; /* Reset sticky positioning for smaller screens */--}}
{{--                width: 100%; /* Full width on smaller screens */--}}
{{--                height: auto; /* Reset height on smaller screens */--}}
{{--                margin-top: 20px; /* Add margin for spacing */--}}
{{--            }--}}
{{--        }--}}
{{--        /* From Uiverse.io by d4niz */--}}
{{--        .contactButton {--}}
{{--            background: #ffffff;--}}
{{--            color: black;--}}
{{--            font-family: inherit;--}}
{{--            padding: 0.45em;--}}
{{--            padding-left: 1em;--}}
{{--            font-size: 17px;--}}
{{--            font-weight: 500;--}}
{{--            border-radius: 0.9em;--}}
{{--            border: none;--}}
{{--            cursor: pointer;--}}
{{--            letter-spacing: 0.05em;--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            box-shadow: inset 0 0 1.6em -0.6em #e0dce6;--}}
{{--            overflow: hidden;--}}
{{--            position: relative;--}}
{{--            height: 2.8em;--}}
{{--            padding-right: 3em;--}}
{{--        }--}}



{{--        .contactButton:hover {--}}
{{--            transform: translate(-0.05em, -0.05em);--}}
{{--            box-shadow: 0.15em 0.15em #f5f6fb;--}}
{{--        }--}}

{{--        .contactButton:active {--}}
{{--            transform: translate(0.05em, 0.05em);--}}
{{--            box-shadow: 0.05em 0.05em #eaebef;--}}
{{--        }--}}
{{--        /* From Uiverse.io by akshat-patel28 */--}}
{{--        .button-container {--}}
{{--            display: flex;--}}
{{--            background: #ffffff;--}}
{{--            align-items: center;--}}
{{--            justify-content: space-around;--}}
{{--            border-radius: 10px;--}}
{{--            rgba(158, 112, 142, 0.5) 5px 10px 15px;--}}
{{--        }--}}

{{--        .button {--}}
{{--            outline: 0 !important;--}}
{{--            border: 0 !important;--}}
{{--            /*width: 40px;*/--}}
{{--            /*height: 40px;*/--}}
{{--            border-radius: 50%;--}}
{{--            background-color: transparent;--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            justify-content: center;--}}
{{--            color: #fff;--}}
{{--            transition: all ease-in-out 0.3s;--}}
{{--            cursor: pointer;--}}
{{--        }--}}

{{--        .button:hover {--}}
{{--            transform: translateY(-3px);--}}
{{--        }--}}

{{--        .icon {--}}
{{--            font-size: 20px;--}}
{{--        }--}}
{{--        #review-container {--}}
{{--            width: 100%;--}}
{{--            max-width: 100%;--}}
{{--            position: relative;--}}
{{--        }--}}

{{--        .review-card {--}}
{{--            background: #fff;--}}
{{--            border-radius: 8px;--}}
{{--            box-shadow: 0 4px 8px rgba(0,0,0,0.1);--}}
{{--            overflow: hidden;--}}
{{--            transition: transform 0.3s ease;--}}
{{--            padding: 20px;--}}
{{--            width: 100%;--}}
{{--            box-sizing: border-box; /* Ensure padding is included in width calculation */--}}
{{--            padding-left: 60px; /* Create space for the left arrow button */--}}
{{--        }--}}

{{--        .review-card:hover {--}}
{{--            transform: translateY(-10px);--}}
{{--            box-shadow: 0 8px 16px rgba(0,0,0,0.2);--}}
{{--        }--}}

{{--        .review-card h4 {--}}
{{--            margin: 0 0 10px;--}}
{{--        }--}}

{{--        .review-card p {--}}
{{--            margin: 0;--}}
{{--        }--}}

{{--        .arrow-button {--}}
{{--            position: absolute;--}}
{{--            top: 50%;--}}
{{--            transform: translateY(-50%);--}}
{{--            background: #333;--}}
{{--            color: #fff;--}}
{{--            border: none;--}}
{{--            border-radius: 50%;--}}
{{--            width: 40px;--}}
{{--            height: 40px;--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            justify-content: center;--}}
{{--            cursor: pointer;--}}
{{--            z-index: 10;--}}
{{--            transition: background 0.3s ease;--}}
{{--        }--}}

{{--        .arrow-button:hover {--}}
{{--            background: #555;--}}
{{--        }--}}

{{--        .arrow-left {--}}
{{--            left: 10px;--}}
{{--        }--}}

{{--        .arrow-right {--}}
{{--            right: 10px;--}}
{{--        }--}}

{{--        /* Carousel container */--}}
{{--        #carousel-container {--}}
{{--            position: relative;--}}
{{--            max-width: 800px;--}}
{{--            margin: 20px auto;--}}
{{--            overflow: hidden;--}}
{{--            border-radius: 10px;--}}
{{--            background: #fff;--}}
{{--            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);--}}
{{--        }--}}

{{--        /* Carousel inner container */--}}
{{--        #carousel-inner {--}}
{{--            display: flex;--}}
{{--            transition: transform 0.5s ease-in-out;--}}
{{--        }--}}

{{--        /* Carousel items */--}}
{{--        .thumcarousel-item {--}}
{{--            min-width: 100%;--}}
{{--            box-sizing: border-box;--}}
{{--            height: 300px; /* Fixed height for the card */--}}
{{--            overflow: hidden; /* Hide anything outside the card */--}}
{{--        }--}}

{{--        /* Card styling */--}}
{{--        .thumcarousel-item .thum-card {--}}
{{--            height: 100%;--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            justify-content: center;--}}
{{--            overflow: hidden;--}}
{{--        }--}}

{{--        .thumcarousel-item img, .thumcarousel-item video {--}}
{{--            width: 100%;--}}
{{--            height: 100%;--}}
{{--            object-fit: cover; /* Ensure images and videos cover the card without distortion */--}}
{{--        }--}}

{{--        /* Navigation buttons */--}}
{{--        .carousel-button {--}}
{{--            position: absolute;--}}
{{--            top: 50%;--}}
{{--            transform: translateY(-50%);--}}
{{--            background: rgba(0, 0, 0, 0.5);--}}
{{--            color: #fff;--}}
{{--            border: none;--}}
{{--            border-radius: 50%;--}}
{{--            width: 40px;--}}
{{--            height: 40px;--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            justify-content: center;--}}
{{--            cursor: pointer;--}}
{{--            z-index: 10;--}}
{{--            transition: background 0.3s ease;--}}
{{--        }--}}

{{--        .carousel-button:hover {--}}
{{--            background: rgba(0, 0, 0, 0.7);--}}
{{--        }--}}

{{--        .carousel-button.prev {--}}
{{--            left: 10px;--}}
{{--        }--}}

{{--        .carousel-button.next {--}}
{{--            right: 10px;--}}
{{--        }--}}
{{--        /* From Uiverse.io by Sandra06ram */--}}
{{--        .btn2 {--}}
{{--            position: relative;--}}
{{--            display: inline-block;--}}
{{--            padding: 10px 20px;--}}
{{--            border: 2px solid #fefefe;--}}
{{--            text-transform: uppercase;--}}
{{--            color: #fefefe;--}}
{{--            text-decoration: none;--}}
{{--            font-weight: 600;--}}
{{--            font-size: 16px;--}}
{{--            transition: 0.3s;--}}
{{--        }--}}

{{--        .btn2::before {--}}
{{--            content: "";--}}
{{--            position: absolute;--}}
{{--            top: -2px;--}}
{{--            left: -2px;--}}
{{--            width: calc(100% + 4px);--}}
{{--            height: calc(100% - -2px);--}}
{{--            background-color: #212121;--}}
{{--            transition: 0.3s ease-out;--}}
{{--            transform: scaleY(1);--}}
{{--        }--}}

{{--        .btn2::after {--}}
{{--            content: "";--}}
{{--            position: absolute;--}}
{{--            top: -2px;--}}
{{--            left: -2px;--}}
{{--            width: calc(100% + 4px);--}}
{{--            height: calc(100% - 50px);--}}
{{--            background-color: #212121;--}}
{{--            transition: 0.3s ease-out;--}}
{{--            transform: scaleY(1);--}}
{{--        }--}}

{{--        .btn2:hover::before {--}}
{{--            transform: translateY(-25px);--}}
{{--            height: 0;--}}
{{--        }--}}

{{--        .btn2:hover::after {--}}
{{--            transform: scaleX(0);--}}
{{--            transition-delay: 0.15s;--}}
{{--        }--}}

{{--        .btn2:hover {--}}
{{--            border: 2px solid #fefefe;--}}
{{--        }--}}

{{--        .btn2 span {--}}
{{--            position: relative;--}}
{{--            z-index: 3;--}}
{{--        }--}}

{{--        button {--}}
{{--            text-decoration: none;--}}
{{--            border: none;--}}
{{--            background-color: transparent;--}}
{{--        }--}}


{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}
{{--@include("home.navbar")--}}
{{--<div id="thum-container">--}}


{{--    <div id="thum-main-content">--}}
{{--        <section id="thum-profile">--}}
{{--            <div class="thum-card">--}}
{{--                <div class="thum-card-body">--}}
{{--                    <div class="thum-profile-details">--}}
{{--                        <button class="contactButton">--}}
{{--                            Tonny--}}
{{--                        </button>--}}
{{--                        <button class="contactButton">--}}
{{--                            Determine--}}
{{--                        </button>--}}
{{--                        <div class="button-container">--}}
{{--                            <button class="button">--}}
{{--                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAB1ElEQVR4nK2VTUiUYRSFn34sSCbNSDIEEYOBICghFyGtBF261YVhjRvBKNwUBEHZWly7MMSNizAKAnEhrjJCo0VFP4tmIUqKNBE6CZVcOBOX8fsbvjnwwce55z335XLvfeEgrgHPge/ADvAauAEcdppDQD+wCKwDH4EJoIUY3Af+AP8CvhdADXAUeBqi+Qn0hpnnJPoN3AUagdO6/bZiY8BD/ReAYd36EjAjfg/oLjc/q+wmGAhIfhn4BRT1WemuBOgey2MTaPCBBwo8iyjfLVeK2yGaI8AraR75wBuRXREJjgF54Jv+w9Apr/eeLIg8STTuAXdiNMfltevJokgLRuFMgkvUuSb4j7zINtKjPahEpb6+XoUEI/Ka9uRNkS+rkGBJXn2erFef2xRnU5hfBP5qpjLlwXFlnk2RYE4etpcImuYfEhwY9QTocd3TFDetX4ETSVwF037S2dEooY36qoRPKkgw5VrTNm4ksm7xDSUwz7nJtaWYCAPuUEeE7qo2q2kHqRCTOrgFXAiZ2FJTmLZiWC3nZbAGtJaVcUOxhZjtGokM8NZ1lrXfeSU0bhmoJSXOAZ9l+M4tRntDTqU1L8GG8IN70VbKn8RqoBn4orLYzk+Efbnmihs2+fQCAAAAAElFTkSuQmCC">--}}
{{--                            </button>--}}
{{--                            <button class="button">--}}
{{--                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABUElEQVR4nO3Wv0ocURiG8V9sYiX2G1svQEGwFSVEG68jCIKignsHoregpEiXMpg+GlJY+AcrQRERsVNQEWGTkQNnYXHPsqvjjCI+8DaHb75n+DhzzvDOK6Mb41jBHxzjJuY4ri3jS6zNTS+qOEfWYULtYnz2SYzi9BHC1AuEKT2KefzPIa0n9JjrVDrzDMKHmW4nHUKtAPE/DLeSdmGvAGk9O9HRxFiB0ixmJCX+VoJ4LSVOjfknKviE9RzrWcxuSnyZKAwN6vTlWM9igqOJ2xLEFynxYaJwPTYLTX7lWM8adnYT30vYXKsp8eRLfU5d2C9Qut3qAAkM4K4AaQ2D2jBdgHhKh3x9pssiXIuznUrrVHNKT1ptpqJGfoYF9Hgia4mmW9jAAa7jz94RNrGEz/goBxVcPTjqwh9kofThb4P0N/qVwEEc3w9M4EMZUm+eezi/qeIuPVA5AAAAAElFTkSuQmCC">                            </button>--}}
{{--                            <button class="button">--}}
{{--                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA5UlEQVR4nL2VQQ6CMBBF3wJugSs1XEvhdCKGC4EnQAMkrDFNhqSaWoG2/mQ2DLwh7Z8Z8KMdUAKDRAWkeIQ/gOkjnpJzVmmAz1H4KDBYCvSu8BgYLQU6F3AO3C1wFZct4AxoNEgNtAa4epYsBUfA2QA+Se4AXOXMe/nz5JuP1Qs3+SgSSK2BGymmck4+bg3gTI7Jm48nuch8C3iJj0cX8N8KVKGPKJXBFOySZycVYtFOPL33ZVMfjXaU3nHeB/GKUeG0D+KFw64IPa57PGgIsQ/QZOuj1fvAJFsfLd4Hv6T30ds+eAEc2Lz1Gk1U1QAAAABJRU5ErkJggg==">                            </button>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="thum-mini-card">--}}
{{--                        <div id="carousel-container">--}}
{{--                            <div id="carousel-inner">--}}
{{--                                <div class="thumcarousel-item"><img src="/images/image1.jpg" alt="Image 1"></div>--}}
{{--                                <div class="thumcarousel-item"><img src="/images/image3.jpg" alt="Image 3"></div>--}}
{{--                                <div class="thumcarousel-item"><img src="/images/image4.jpg" alt="Image 4"></div>--}}

{{--                                <div class="thumcarousel-item"><video controls><source src="video1.mp4" type="video/mp4">Your browser does not support the video tag.</video></div>--}}
{{--                            </div>--}}
{{--                            <button class="carousel-button prev" id="prev-button"><i class="fa fa-chevron-left"></i></button>--}}
{{--                            <button class="carousel-button next" id="next-button"><i class="fa fa-chevron-right"></i></button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="thum-card">--}}
{{--                <div class="thum-card-body">--}}
{{--                    <h4>Software development</h4>--}}
{{--                    <p>I will develop systems which includes but not limited to a complete website,--}}
{{--                        simple command line and 2D python games, Website maintenance,--}}
{{--                        data analysis and better storage for easy querying of big data.--}}
{{--                        I have 5 years of experience doing this--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}

{{--        <section id="thum-packages">--}}
{{--            <div id="thum-package-nav">--}}
{{--                <button class="thum-toggle-btn" data-package="basic">Basic</button>--}}
{{--                <button class="thum-toggle-btn" data-package="standard">Standard </button>--}}
{{--                <button class="thum-toggle-btn" data-package="premium">Premium </button>--}}
{{--            </div>--}}
{{--            <div id="thum-package-content">--}}
{{--                <div class="thum-package-details" id="thum-basic">--}}
{{--                    <h5>Basic (Bag)</h5>--}}
{{--                    <p><strong>Price:</strong> $15</p>--}}
{{--                    <p><strong>Description:</strong> 16 - 32 pixel size illustration</p>--}}
{{--                    <p><strong>Delivery Time:</strong> 2 days</p>--}}
{{--                    <p><strong>Revisions:</strong> 2</p>--}}
{{--                    <p><strong>Features:</strong> Printable resolution, add background/scene, include colors and entire body illustration, commercial use.</p>--}}
{{--                </div>--}}
{{--                <div class="thum-package-details" id="thum-standard">--}}
{{--                    <h5>Standard (Crate)</h5>--}}
{{--                    <p><strong>Price:</strong> $30</p>--}}
{{--                    <p><strong>Description:</strong> 32 - 120 pixel size illustration</p>--}}
{{--                    <p><strong>Delivery Time:</strong> 3 days</p>--}}
{{--                    <p><strong>Revisions:</strong> 2</p>--}}
{{--                    <p><strong>Features:</strong> Printable resolution, add background/scene, include colors and entire body illustration, commercial use.</p>--}}
{{--                </div>--}}
{{--                <div class="thum-package-details" id="thum-premium">--}}
{{--                    <h5>Premium (Wagon)</h5>--}}
{{--                    <p><strong>Price:</strong> $75</p>--}}
{{--                    <p><strong>Description:</strong> 350 pixel size illustration</p>--}}
{{--                    <p><strong>Delivery Time:</strong> 4 days</p>--}}
{{--                    <p><strong>Revisions:</strong> 2</p>--}}
{{--                    <p><strong>Features:</strong> Printable resolution, add background/scene, include colors and entire body illustration, commercial use.</p>--}}
{{--                </div>--}}
{{--                <button>--}}
{{--                    <a href="#" class="btn2"><span class="spn2">Contact</span></a>--}}
{{--                </button>--}}

{{--            </div>--}}
{{--        </section>--}}

{{--    </div>--}}

{{--    <div >--}}
{{--        <div class="thum-card">--}}
{{--            <div class="thum-card-body">--}}
{{--                <ul class="icon-list">--}}
{{--                    <li><i class="fa fa-home"></i> Netflix n chill</li>--}}
{{--                    <li><i class="fa fa-briefcase"></i> Business managers</li>--}}
{{--                    <li><i class="fa fa-user"></i> Human resource management</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div id="review-container">--}}
{{--            <div class="review-card" id="review-1">--}}
{{--                <h4>John Doe</h4>--}}
{{--                <p>★★★★★</p>--}}
{{--                <p>Great service! Highly recommend.</p>--}}
{{--            </div>--}}
{{--            <div class="review-card" id="review-2" style="display: none;">--}}
{{--                <h4>Jane Smith</h4>--}}
{{--                <p>★★★★☆</p>--}}
{{--                <p>Good experience, but room for improvement.</p>--}}
{{--            </div>--}}
{{--            <div class="review-card" id="review-3" style="display: none;">--}}
{{--                <h4>Samuel Johnson</h4>--}}
{{--                <p>★★★★★</p>--}}
{{--                <p>Exceptional quality and timely delivery.</p>--}}
{{--            </div>--}}
{{--            <button class="arrow-button arrow-left" id="thisprev-button"><i class="fa fa-chevron-left"></i></button>--}}
{{--            <button class="arrow-button arrow-right" id="thisnext-button"><i class="fa fa-chevron-right"></i></button>--}}
{{--        </div>--}}
{{--        <div class="thum-card">--}}
{{--            <div class="thum-card-body">--}}
{{--                <h4>Quiz one</h4>--}}
{{--                <p>Answer--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="thum-card">--}}
{{--            <div class="thum-card-body">--}}
{{--                <h4>Quiz one</h4>--}}
{{--                <p>Answer--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>    <div class="thum-card">--}}
{{--            <div class="thum-card-body">--}}
{{--                <h4>Milestone one</h4>--}}
{{--                <p>Answer--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>    <div class="thum-card">--}}
{{--            <div class="thum-card-body">--}}
{{--                <h4>Milestone two</h4>--}}
{{--                <p>Answer--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>    <div class="thum-card">--}}
{{--            <div class="thum-card-body">--}}
{{--                <h4>Milestone three</h4>--}}
{{--                <p>Answer--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}


{{--</div>--}}
{{--@include("home.footer")--}}
{{--<!-- Scripts -->--}}
{{--<script src="js/jquery.min.js"></script>--}}
{{--<script src="js/bootstrap.min.js"></script>--}}
{{--<script src="js/owl.carousel.min.js"></script>--}}
{{--<script src="js/scripts.js"></script>--}}
{{--<script src="js/custom.js"></script>--}}
{{--<script>--}}
{{--    // scripts.js--}}
{{--    document.addEventListener('DOMContentLoaded', () => {--}}
{{--        const carouselInner = document.getElementById('carousel-inner');--}}
{{--        const prevButton = document.getElementById('prev-button');--}}
{{--        const nextButton = document.getElementById('next-button');--}}

{{--        let index = 0;--}}
{{--        const items = document.querySelectorAll('.thumcarousel-item');--}}
{{--        const totalItems = items.length;--}}

{{--        function updateCarousel() {--}}
{{--            const offset = -index * 100;--}}
{{--            carouselInner.style.transform = `translateX(${offset}%)`;--}}
{{--        }--}}

{{--        prevButton.addEventListener('click', () => {--}}
{{--            index = (index > 0) ? index - 1 : totalItems - 1;--}}
{{--            updateCarousel();--}}
{{--        });--}}

{{--        nextButton.addEventListener('click', () => {--}}
{{--            index = (index < totalItems - 1) ? index + 1 : 0;--}}
{{--            updateCarousel();--}}
{{--        });--}}

{{--        updateCarousel(); // Initialize carousel position--}}
{{--    });--}}


{{--    document.addEventListener('DOMContentLoaded', () => {--}}
{{--        const reviews = document.querySelectorAll('.review-card');--}}
{{--        const prevButton = document.getElementById('thisprev-button');--}}
{{--        const nextButton = document.getElementById('thisnext-button');--}}

{{--        let currentIndex = 0;--}}

{{--        function showReview(index) {--}}
{{--            reviews.forEach((review, i) => {--}}
{{--                review.style.display = (i === index) ? 'block' : 'none';--}}
{{--            });--}}
{{--        }--}}

{{--        prevButton.addEventListener('click', () => {--}}
{{--            currentIndex = (currentIndex > 0) ? currentIndex - 1 : reviews.length - 1;--}}
{{--            showReview(currentIndex);--}}
{{--        });--}}

{{--        nextButton.addEventListener('click', () => {--}}
{{--            currentIndex = (currentIndex < reviews.length - 1) ? currentIndex + 1 : 0;--}}
{{--            showReview(currentIndex);--}}
{{--        });--}}

{{--        showReview(currentIndex);--}}
{{--    });--}}
{{--    document.addEventListener('DOMContentLoaded', () => {--}}
{{--        // Get all buttons and package details--}}
{{--        const buttons = document.querySelectorAll('#thum-package-nav .thum-toggle-btn');--}}
{{--        const packageDetails = document.querySelectorAll('#thum-package-content .thum-package-details');--}}

{{--        // Function to hide all package details--}}
{{--        function hideAllPackages() {--}}
{{--            packageDetails.forEach(detail => {--}}
{{--                detail.style.display = 'none';--}}
{{--            });--}}
{{--        }--}}

{{--        // Function to show the selected package details--}}
{{--        function showPackage(packageId) {--}}
{{--            hideAllPackages(); // First hide all--}}
{{--            const selectedPackage = document.getElementById(packageId);--}}
{{--            if (selectedPackage) {--}}
{{--                selectedPackage.style.display = 'block';--}}
{{--            }--}}
{{--        }--}}

{{--        // Add click event listeners to all buttons--}}
{{--        buttons.forEach(button => {--}}
{{--            button.addEventListener('click', () => {--}}
{{--                const packageType = button.getAttribute('data-package');--}}
{{--                const packageId = `thum-${packageType}`;--}}
{{--                showPackage(packageId);--}}
{{--            });--}}
{{--        });--}}

{{--        // Optionally, you can set the default visible package--}}
{{--        showPackage('thum-basic'); // Default to Basic--}}
{{--    });--}}


{{--</script>--}}
{{--</body>--}}
{{--</html>--}}
