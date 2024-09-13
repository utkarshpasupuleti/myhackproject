<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ripos</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@600&display=swap" rel="stylesheet">
    @include("home.styles")
    <link rel="icon" href="images/favicon.png">

</head>
<body data-spy="scroll" data-target=".fixed-top">

<!-- Spinner for page load and scrolling -->
<div id="spinner" class="spinner">
    <div class="spinner-blade"></div>
    <div class="spinner-blade"></div>
    <div class="spinner-blade"></div>
    <div class="spinner-blade"></div>
    <div class="spinner-blade"></div>
    <div class="spinner-blade"></div>
    <div class="spinner-blade"></div>
    <div class="spinner-blade"></div>
    <div class="spinner-blade"></div>
    <div class="spinner-blade"></div>
    <div class="spinner-blade"></div>
    <div class="spinner-blade"></div>
</div>

<!-- Container for Navbar and Search Bar -->
<div class="header-container">
    @include("home.navbar")
    @include("category.category")
    @include("home.searchbar")
</div>
@include("search.main")

<!-- Card Section -->
<div class="mbato-container mt-5">
    <div class="row" id="card-container">
        <!-- Cards will be loaded here by the jQuery script -->
    </div>
    <!-- Load More Button -->
    <div id="load-more-container" class="text-center mt-4">
        <button id="load-more" class="btn btn-primary">Load More</button>
    </div>
</div>

@guest
    @include("home.authpopup")
@endguest

<!-- Footer Section -->
@include("home.footer")

<!-- Scripts -->
@include("home.scripts")
<script>
    $(document).ready(function() {
        let currentPage = 1;
        const cardsPerPage = 3;
        const $cardContainer = $('#card-container');
        const $spinner = $('#spinner');
        const $loadMoreButton = $('#load-more');
        let loading = false;

        // Show the spinner on page load
        $spinner.show();

        // Pass the query variable from Blade to JavaScript
        let query = @json($query);
        console.log('Query:', query); // Check the query value here

        // Array of gig results to filter the results
        const gigResults = @json($gigresults);
        console.log('Gig Results:', gigResults); // Check value here

        // Function to fetch and load cards
        function loadCards(page) {
            if (loading) return;
            loading = true;
            $spinner.show();

            $.ajax({
                url: `/api/cards?page=${page}`,
                method: 'GET',
                data: {
                    gigCategories: gigResults.gigCategories,
                    gigSubcategories: gigResults.gigSubcategories,
                    gigMinisubcategories: gigResults.gigMinisubcategories,
                    gigminiMinisubcategories:gigResults.gigFiners,
                    gigGigs: gigResults.gigGigs,
                    query: query // Pass the query variable
                },
                success: function(data) {
                    if (data.cards.length > 0) {
                        const cardsHtml = data.cards.map(card => {
                            const images = JSON.parse(card.images).map(image => image.replace(/\\/g, '/'));
                            const videos = JSON.parse(card.videos).map(video => video.replace(/\\/g, '/'));

                            return `
                                <div class="col-md-4 col-sm-6 mb-4 mbato-card-wrapper" data-card-id="${card.id}">
                                    <div class="mbato-card">
                                        <div class="mbato-carousel" id="carousel-${card.id}">
                                            <div class="mbato-carousel-items">
                                                ${images.map(image => `<div class="mbato-carousel-item"><img src="/${image}" alt="Card Image"></div>`).join('')}
                                                ${videos.map(video => `<div class="mbato-carousel-item"><video src="/${video}" controls></video></div>`).join('')}
                                            </div>
                                            <div class="mbato-carousel-controls">
                                                <button class="mbato-carousel-control mbato-prev" data-carousel-id="carousel-${card.id}">&lt;</button>
                                                <button class="mbato-carousel-control mbato-next" data-carousel-id="carousel-${card.id}">&gt;</button>
                                            </div>
                                        </div>
                                        <div class="mbato-card-body">
                                            <h5 class="mbato-card-title">${card.title}</h5>
                                            <p class="mbato-card-text">${card.description}</p>
                                            <p class="mbato-card-rating">${card.rating}</p>
                                            <p class="mbato-card-price">From ${card.price}</p>
                                        </div>
                                    </div>
                                </div>
                            `;
                        }).join('');
                        $cardContainer.append(cardsHtml);
                        initializeCarousels();
                        currentPage++;
                        loading = false;
                    } else {
                        $loadMoreButton.hide(); // Hide button if no more cards
                    }
                    $spinner.hide(); // Hide spinner after cards are loaded
                },
                error: function() {
                    loading = false;
                    alert('An error occurred while loading cards.');
                    $spinner.hide(); // Hide spinner on error
                }
            });
        }

        // Function to initialize carousels
        function initializeCarousels() {
            document.querySelectorAll('.mbato-carousel').forEach(function(carousel) {
                const carouselId = carousel.id;
                const prevBtn = document.querySelector(`.mbato-carousel-control.mbato-prev[data-carousel-id="${carouselId}"]`);
                const nextBtn = document.querySelector(`.mbato-carousel-control.mbato-next[data-carousel-id="${carouselId}"]`);
                const carouselItems = carousel.querySelector('.mbato-carousel-items');
                const totalItems = carousel.querySelectorAll('.mbato-carousel-item').length;
                let index = 0;

                function showItem(index) {
                    const offset = -index * 100;
                    carouselItems.style.transform = `translateX(${offset}%)`;
                }

                prevBtn.addEventListener('click', (event) => {
                    event.stopPropagation(); // Prevent event from bubbling up
                    index = (index > 0) ? index - 1 : totalItems - 1;
                    showItem(index);
                });

                nextBtn.addEventListener('click', (event) => {
                    event.stopPropagation(); // Prevent event from bubbling up
                    index = (index < totalItems - 1) ? index + 1 : 0;
                    showItem(index);
                });

                // Initialize
                showItem(index);
            });
        }

        // Load initial cards
        loadCards(currentPage);

        // Load more cards on button click
        $loadMoreButton.click(function() {
            loadCards(currentPage);
        });

        // Infinite scroll
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
                loadCards(currentPage);
            }
        });

        // Delegate click event for card navigation
        $cardContainer.on('click', '.mbato-card-wrapper', function() {
            const gigId = $(this).data('card-id');
            window.location.href = `/gigdetails?jsiirhsyyuudiinsgg=${gigId}`;
        });
    });
</script>




</body>
</html>
