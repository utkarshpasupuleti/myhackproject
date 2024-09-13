<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h2 class="photo-album-heading">Testimonials</h2>
        </div>
        <div class="testimonial-container">
            <div class="testimonial-wrapper">
                <div class="testimonial-content">
                    <div class="testimonial-item">
                        <div class="testimonial-content d-flex align-items-center flex-column flex-md-row">
                            <div class="testimonial-video">
                                <video src="path/to/video1.mp4" controls></video>
                            </div>
                            <div class="testimonial-text mt-3 mt-md-0 ms-md-4" style="padding: 10px" >
                                <p class="fs-5">
                                    The platform provides equal opportunities for all users to reduce their workload.
                                </p>
                                <h3>Tonny Blair</h3>
                                <span class="text-primary">Founder, Ripos</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-content d-flex align-items-center flex-column flex-md-row">
                            <div class="testimonial-video">
                                <video src="path/to/video2.mp4" controls></video>
                            </div>
                            <div class="testimonial-text mt-3 mt-md-0 ms-md-4" style="padding: 10px">
                                <p class="fs-5">
                                    The platform provides equal opportunities for all users to reduce their workload.
                                </p>
                                <h3>Tonny Blair</h3>
                                <span class="text-primary">Founder, Ripos</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-content d-flex align-items-center flex-column flex-md-row">
                            <div class="testimonial-video">
                                <video src="path/to/video3.mp4" controls></video>
                            </div>
                            <div class="testimonial-text mt-3 mt-md-0 ms-md-4" style="padding: 10px">
                                <p class="fs-5">
                                    The platform provides equal opportunities for all users to reduce their workload.
                                </p>
                                <h3>Tonny Blair</h3>
                                <span class="text-primary">Founder, Ripos</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-nav">
                    <button id="prev" class="nav-button">&#10094;</button>
                    <button id="next" class="nav-button">&#10095;</button>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    /* Base Styles */
    .container-xxl {
        padding-top: 5rem;
        padding-bottom: 5rem;
    }

    .photo-album-heading {
        font-size: 2.5rem;
        font-weight: bold;
        color: #333;
    }

    .testimonial-container {
        position: relative;
        overflow: hidden;
    }

    .testimonial-wrapper {
        position: relative;
    }

    .testimonial-content {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .testimonial-item {
        flex: 1 0 100%;
        box-sizing: border-box;
        padding: 1rem;
        display: flex;
        align-items: center;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-right: 1rem;
        overflow: hidden; /* Prevent overflow issues */
    }

    .testimonial-video {
        flex: 0 0 150px;
        margin-bottom: 1rem; /* Space between video and text on mobile */
    }

    .testimonial-video video {
        width: 100%;
        border-radius: 8px;
    }

    .testimonial-text {
        flex: 1;
    }

    .testimonial-text p {
        font-size: 1.125rem;
        margin-bottom: 0.5rem;
    }

    .testimonial-text h3 {
        font-size: 1.25rem;
        margin: 0;
    }

    .testimonial-text span {
        display: block;
        color: #007bff;
    }

    .testimonial-nav {
        text-align: center;
        margin-top: 1rem;
    }

    .nav-button {
        background: none;
        border: 1px solid #007bff;
        color: #007bff;
        border-radius: 50%;
        font-size: 1.5rem;
        padding: 0.5rem 1rem;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
        margin: 0 0.5rem;
    }

    .nav-button:hover {
        background-color: #007bff;
        color: #fff;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .testimonial-item {
            flex-direction: column;
            align-items: stretch;
        }

        .testimonial-video {
            flex: none;
            width: 100%;
            margin-bottom: 1rem;
        }

        .testimonial-text {
            text-align: center;
        }

        .testimonial-nav {
            display: flex;
            justify-content: center;
        }
    }

    @media (max-width: 576px) {
        .photo-album-heading {
            font-size: 2rem;
        }

        .testimonial-text p {
            font-size: 1rem;
        }

        .testimonial-text h3 {
            font-size: 1.125rem;
        }
    }

</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const testimonialWrapper = document.querySelector('.testimonial-wrapper');
        const testimonials = document.querySelector('.testimonial-content');
        const items = document.querySelectorAll('.testimonial-item');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');
        let index = 0;
        const totalItems = items.length;

        function updateCarousel() {
            const offset = -index * 100;
            testimonials.style.transform = `translateX(${offset}%)`;
        }

        prevButton.addEventListener('click', () => {
            index = (index > 0) ? index - 1 : totalItems - 1;
            updateCarousel();
        });

        nextButton.addEventListener('click', () => {
            index = (index < totalItems - 1) ? index + 1 : 0;
            updateCarousel();
        });

        // Optional: Auto-slide
        setInterval(() => {
            nextButton.click();
        }, 5000); // Change slide every 5 seconds
    });

</script>
