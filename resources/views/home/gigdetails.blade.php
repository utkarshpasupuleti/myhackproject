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
    <link rel="stylesheet" href="css/gigdet.css">


</head>
<body>
@include("home.navbar")
@include("category.category")

<!-- Search Bar -->
@include("home.searchbar")
</div>
<div id="thum-container">


    <div id="thum-main-content">
        <section id="thum-profile">
            <div class="thum-card">
                <div class="thum-card-body">
                    <div class="thum-profile-details">
{{--                        <button class="button">--}}
{{--                            {{$displayName}}--}}
{{--                        </button>--}}
                        <button class="button">
                            /{{$category}}
                        </button>
                        <div class="button-container">
                            @if($favourites == NULL)
                            <form method="post"  action="{{ route('favourites') }}" >
                                @csrf
                                <input class="visible" value="{{$gig->id}}" name="gig_id">
                                <button class="button">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAB1ElEQVR4nK2VTUiUYRSFn34sSCbNSDIEEYOBICghFyGtBF261YVhjRvBKNwUBEHZWly7MMSNizAKAnEhrjJCo0VFP4tmIUqKNBE6CZVcOBOX8fsbvjnwwce55z335XLvfeEgrgHPge/ADvAauAEcdppDQD+wCKwDH4EJoIUY3Af+AP8CvhdADXAUeBqi+Qn0hpnnJPoN3AUagdO6/bZiY8BD/ReAYd36EjAjfg/oLjc/q+wmGAhIfhn4BRT1WemuBOgey2MTaPCBBwo8iyjfLVeK2yGaI8AraR75wBuRXREJjgF54Jv+w9Apr/eeLIg8STTuAXdiNMfltevJokgLRuFMgkvUuSb4j7zINtKjPahEpb6+XoUEI/Ka9uRNkS+rkGBJXn2erFef2xRnU5hfBP5qpjLlwXFlnk2RYE4etpcImuYfEhwY9QTocd3TFDetX4ETSVwF037S2dEooY36qoRPKkgw5VrTNm4ksm7xDSUwz7nJtaWYCAPuUEeE7qo2q2kHqRCTOrgFXAiZ2FJTmLZiWC3nZbAGtJaVcUOxhZjtGokM8NZ1lrXfeSU0bhmoJSXOAZ9l+M4tRntDTqU1L8GG8IN70VbKn8RqoBn4orLYzk+Efbnmihs2+fQCAAAAAElFTkSuQmCC">
                                </button>

                            </form>

                            @else
                                <button class="button">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAB1ElEQVR4nK2VTUiUYRSFn34sSCbNSDIEEYOBICghFyGtBF261YVhjRvBKNwUBEHZWly7MMSNizAKAnEhrjJCo0VFP4tmIUqKNBE6CZVcOBOX8fsbvjnwwce55z335XLvfeEgrgHPge/ADvAauAEcdppDQD+wCKwDH4EJoIUY3Af+AP8CvhdADXAUeBqi+Qn0hpnnJPoN3AUagdO6/bZiY8BD/ReAYd36EjAjfg/oLjc/q+wmGAhIfhn4BRT1WemuBOgey2MTaPCBBwo8iyjfLVeK2yGaI8AraR75wBuRXREJjgF54Jv+w9Apr/eeLIg8STTuAXdiNMfltevJokgLRuFMgkvUuSb4j7zINtKjPahEpb6+XoUEI/Ka9uRNkS+rkGBJXn2erFef2xRnU5hfBP5qpjLlwXFlnk2RYE4etpcImuYfEhwY9QTocd3TFDetX4ETSVwF037S2dEooY36qoRPKkgw5VrTNm4ksm7xDSUwz7nJtaWYCAPuUEeE7qo2q2kHqRCTOrgFXAiZ2FJTmLZiWC3nZbAGtJaVcUOxhZjtGokM8NZ1lrXfeSU0bhmoJSXOAZ9l+M4tRntDTqU1L8GG8IN70VbKn8RqoBn4orLYzk+Efbnmihs2+fQCAAAAAElFTkSuQmCC">
                                </button>
                            @endif

                            <button class="button">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABUElEQVR4nO3Wv0ocURiG8V9sYiX2G1svQEGwFSVEG68jCIKignsHoregpEiXMpg+GlJY+AcrQRERsVNQEWGTkQNnYXHPsqvjjCI+8DaHb75n+DhzzvDOK6Mb41jBHxzjJuY4ri3jS6zNTS+qOEfWYULtYnz2SYzi9BHC1AuEKT2KefzPIa0n9JjrVDrzDMKHmW4nHUKtAPE/DLeSdmGvAGk9O9HRxFiB0ixmJCX+VoJ4LSVOjfknKviE9RzrWcxuSnyZKAwN6vTlWM9igqOJ2xLEFynxYaJwPTYLTX7lWM8adnYT30vYXKsp8eRLfU5d2C9Qut3qAAkM4K4AaQ2D2jBdgHhKh3x9pssiXIuznUrrVHNKT1ptpqJGfoYF9Hgia4mmW9jAAa7jz94RNrGEz/goBxVcPTjqwh9kofThb4P0N/qVwEEc3w9M4EMZUm+eezi/qeIuPVA5AAAAAElFTkSuQmCC">                            </button>
                            <button class="button">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAAA5UlEQVR4nL2VQQ6CMBBF3wJugSs1XEvhdCKGC4EnQAMkrDFNhqSaWoG2/mQ2DLwh7Z8Z8KMdUAKDRAWkeIQ/gOkjnpJzVmmAz1H4KDBYCvSu8BgYLQU6F3AO3C1wFZct4AxoNEgNtAa4epYsBUfA2QA+Se4AXOXMe/nz5JuP1Qs3+SgSSK2BGymmck4+bg3gTI7Jm48nuch8C3iJj0cX8N8KVKGPKJXBFOySZycVYtFOPL33ZVMfjXaU3nHeB/GKUeG0D+KFw64IPa57PGgIsQ/QZOuj1fvAJFsfLd4Hv6T30ds+eAEc2Lz1Gk1U1QAAAABJRU5ErkJggg==">                            </button>

                        </div>
                    </div>
                    <div class="thum-mini-card">
                        <div id="carousel-container">
                            <div id="carousel-inner">
                                @foreach($imagePaths as $imagePath)
                                    <div class="thumcarousel-item">
                                        <img src="{{ asset($imagePath) }}" alt="Image">
                                    </div>
                                @endforeach

                                @if($videoPath)
                                    <div class="thumcarousel-item">
                                        <video controls>
                                            <source src="{{ asset($videoPath) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                @endif
                            </div>
                            <button class="carousel-button prev" id="prev-button"><i class="fa fa-chevron-left"></i></button>
                            <button class="carousel-button next" id="next-button"><i class="fa fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="thum-card">
                <div class="thum-card-body">
                    <h4>{{$gig -> title}}</h4>
                    <p>{{$gig -> gigdesc}}
                    </p>
                </div>
            </div>
            <div class="thum-card">
                <div class="thum-card-body">
                    <h4>Professional summary</h4>
                    <p>{{$gig -> gig_description_summary}}
                    </p>
                </div>
            </div>
        </section>

        <section id="thum-packages">
            <h4 style="text-align: center">Select a suitable package below</h4>


            <div id="thum-package-nav">
                @foreach($packages as $package)
                    <button class="thum-toggle-btn" data-package="{{ strtolower($package->name) }}">
                        {{ $package->name }}
                    </button>
                @endforeach
            </div>
            <div id="thum-package-content">

            @foreach($packages as $package)
                    <div class="thum-package-details" id="thum-{{ strtolower($package->name) }}">
                        <h5>{{ $package->name }}</h5>
                        <p><strong>Price:</strong> $ {{ $package->price }}</p>
                        <p><strong>Description:</strong> {{ $package->short_description }}</p>
                        <p><strong>Delivery Time:</strong> {{ $package->delivery_time }} days</p>
                        <p><strong>Revisions:</strong> {{ $package->revisions }}</p>
                        <p><strong>Features:</strong></p>
                        <ul>
                            @foreach(explode(',', $package->features) as $feature)
                                <li>{{ trim($feature) }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
                <button>
                    <a href="#" class="btn2"><span class="spn2">Contact</span></a>
                </button>
            </div>
        </section>

    </div>

    <div >
        <div style="text-align: center">
            <div class="thum-card-body">
                <h5>Available Milestones</h5>
            </div>
        </div>
        @foreach($milestones as $milestone)
            <div class="thum-card">
                <div class="thum-card-body">
                    <h6>{{ $milestone->title }}</h6>
                    <p><strong>Description:</strong> {{ $milestone->description }}</p>
                    <p><strong>Price:</strong> $ {{ $milestone->price }}</p>
                </div>
            </div>
        @endforeach

        <div style="text-align: center">
            <div class="thum-card-body">
                <h4>Extras</h4>
            </div>
        </div>
        @foreach($extras as $extras)
            <div class="thum-card">
                <div class="thum-card-body">
                    <h5>{{ $extras->package }} ({{$extras->title}})</h5>
                    <p>{{ $extras->description }} @ $ <strong>{{ $extras->price }} </strong></p>
                </div>
            </div>
        @endforeach

        <div style="text-align: center">
            <div class="thum-card-body">
                <h4>Reviews</h4>
            </div>
        </div>

        <div id="review-container">
            <div class="review-card" id="review-1">
                <h4>John Doe</h4>
                <p>★★★★★</p>
                <p>Great service! Highly recommend.</p>
            </div>
            <div class="review-card" id="review-2" style="display: none;">
                <h4>Jane Smith</h4>
                <p>★★★★☆</p>
                <p>Good experience, but room for improvement.</p>
            </div>
            <div class="review-card" id="review-3" style="display: none;">
                <h4>Samuel Johnson</h4>
                <p>★★★★★</p>
                <p>Exceptional quality and timely delivery.</p>
            </div>
            <button class="arrow-button arrow-left" id="thisprev-button"><i class="fa fa-chevron-left"></i></button>
            <button class="arrow-button arrow-right" id="thisnext-button"><i class="fa fa-chevron-right"></i></button>
        </div>
        <div style="text-align: center">
            <div class="thum-card-body">
                <h4>Entails</h4>
            </div>
        </div>
        <div class="thum-card">
            <div class="thisthum-card-body">
            @foreach($allNames as $name)
                    <div class="smallcards"># {{ $name }}</div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<section class="faqs">
    <div class="container">
        <h2 class="faqs-heading">Frequently Asked Questions</h2>
        @foreach($faqs as $faq)
        <div class="accordion" id="faqsAccordion">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{ $faq->question }}?
                        </button>
                    </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqsAccordion">
                    <div class="card-body">
                        {{ $faq->answer }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

@include("home.footer")
<!-- Scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
<script src="js/gig.js"></script>


</body>
</html>
