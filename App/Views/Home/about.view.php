<?php
/** @var \App\Core\LinkGenerator $link */
?>

<section class="index-selection about d-flex justify-content-center align-items-center">
    <div class="container text-center">
        <h1 class="display-4 text-white">Welcome to Our Website</h1>
        <a href="#about-us" class="btn btn-outline-danger mt-2">About Us</a>
    </div>
</section>

<section id="about-us" class="py-5">
    <div class="container text-center">
        <h2>About Us</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam. Vestibulum molestie nisl in leo pharetra tempus. Nam lectus augue, vulputate sed quam id, tempus pulvinar neque.
            Vestibulum sed libero in velit dapibus faucibus et quis augue. Integer porta semper purus, sed ullamcorper massa porta ac. Sed ac elit erat.
            Sed maximus finibus eleifend. Suspendisse eget orci sit amet dolor sollicitudin mollis. Mauris nec vulputate metus. Praesent commodo placerat eros, in lobortis orci tempus et.
            In tempus, tortor eget aliquam condimentum, nulla risus dignissim tellus, sit amet vestibulum diam velit a mi. Phasellus vel lorem tristique, gravida neque sed, ultrices nibh.
            Suspendisse pulvinar finibus diam, ac efficitur urna lacinia eu. Pellentesque quis sem ex. Donec ut hendrerit sapien, et sagittis enim.</p>
    </div>
</section>

<section id="services" class="py-5 bg-light">
    <div class="container text-center">
        <h2>Our Services</h2>
        <div class="row">
            <div class="col-md-4">
                <i class="bi bi-airplane" style="font-size: 3rem;"></i>
                <h4>Flight Booking</h4>
                <p>Easy and affordable flight bookings.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-house-door" style="font-size: 3rem;"></i>
                <h4>Hotel Reservations</h4>
                <p>Comfortable stays for every budget.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-bag-check" style="font-size: 3rem;"></i>
                <h4>Travel Insurance</h4>
                <p>Safe and secure journeys.</p>
            </div>
        </div>
    </div>
</section>

<section id="testimonials" class="py-5">
    <div class="container text-center">
        <h2>Testimonials</h2>
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <p>"Sed maximus finibus eleifend."</p>
                    <h5>- John Doe</h5>
                </div>
                <div class="carousel-item">
                    <p>"Pellentesque quis sem ex!"</p>
                    <h5>- Jane Smith</h5>
                </div>
                <div class="carousel-item">
                    <p>"Integer porta semper purus, sed ullamcorper massa."</p>
                    <h5>- Alex Brown</h5>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>
        </div>
    </div>
</section>

<footer class="footer text-center py-3 mt-auto bg-dark text-white">
    <div class="container">
        <p>UNIZA TRAVEL</p>
        <p>&copy; 2024 UNIZA TRAVEL. All rights reserved.</p>
    </div>
</footer>

