<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="https://nicol.co.tz/wp-content/uploads/2021/12/nicocr7-1.png">
    <!-- -------- anime css ------ -->
    <!-- <base href="public"> -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- --------- tiny slider css ------ -->
    <link rel="stylesheet" href="assets/css/tiny-slider.css">
    <!-- --------- font awsome css ------ -->
    <link rel="stylesheet" href="assets/css/all.css">
    <!-- -------- venobox css ------- -->
    <link rel="stylesheet" href="assets/css/venobox.css" type="text/css" media="screen" />
    <!-- ---- Bootstrap css--- -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- ---------- default css --------- -->
    <link rel="stylesheet" href="assets/css/default.css">
    <!-- --- style css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- --------- preloader ------------ -->
    <div class="preloader">
        <div class="loader">
            <div class="spinner">
                <div class="spinner-container">
                    <div class="spinner-rotator">
                        <div class="spinner-left">
                            <div class="spinner-circle"></div>
                        </div>
                        <div class="spinner-right">
                            <div class="spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------   Header star ------>
    <header class="header-area">
        <div class="navbar-area">
            <!---- navbar star--->

            <div class="container-fluid " style="height: 30px; width: 100%; background-color: #3A9340;"></div>
            <nav class="navbar navbar-expand-lg navbar-light p-0" style="background-color: #040404;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img class="image" src="https://nicol.co.tz/wp-content/uploads/2021/12/nicocr7-1.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">

                            @if (Route::has('login'))
                            @auth
                            <li class="nav-item">
                                <x-app-layout></x-app-layout>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link active" data-scroll-nav="0" aria-current="page" href="#">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-scroll-nav="2" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('login') }}">Login</a>
                            </li>

                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('register') }}">Register</a>
                            </li>
                            @endif
                            @endauth
                            @endif

                        </ul>

                    </div>
                </div>
            </nav>

        </div>
        <!---- navbar end--->
        <div class="header-hero" data-scroll-index="0">
            <!---- home star ------>
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
            <div class="shape shape-4"></div>
            <div class="shape shape-5"></div>
            <div class="shape shape-6"></div>
            <div class="container">
                <div class="row align-items-center justify-content-center justify-content-lg-between">
                    <div class="hero-in-side">
                        <div class="col-lg-6 col-md-10">
                            <div class="header-hero-content">
                                <h1 class="header-title wow fadeInLeftBig" data-wow-duration="3s" data-wow-delay="0.2s" style=" margin-top: 150px; ">The Economic Shield of The Nation</h1>
                                <p class="text wow fadeInLeftBig" data-wow-duration="3s" data-wow-delay="0.4s">
                                    NICOL was initially formed in 1999 . Its main goal is to economically empower ordinary citizens by acquiring a stake in the economy of Tanzania through joint ownership in viable economic ventures.</p>
                                <ul class="d-flex">
                                    <li><a href="{{ route('login') }}" class="main-btn wow fadeInLeftBig" data-wow-duration="3s" data-wow-delay="0.8s">
                                            Signin Now</a></li>
                                    <li><a href="https://www.youtube.com/watch?v=1nzoOOhQjpY" class="header-video venobox wow fadeInLeftBig" data-autoplay="true" data-vbtype="video" data-wow-duration="3s" data-wow-delay="1.2s"><i class="fas fa-play"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="header-image">
                                <!-- <img src="assets/img/header/header-app.png" alt="" class="image-1  wow fadeInRightBig" data-wow-duration="3s" data-wow-delay="0.5s"> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="header-shape-1"></div>
                <div class="header-shape-2">
                    <!-- <img src="assets/img/header/header.svg" alt=""> -->
                </div>
            </div>
        </div>
        <!---- home star ------>
    </header>
    <!--------   Header End ----  -->
    <!-- ------- Feature Section Start ---------- -->
    <section class="feature-section pt-80" data-scroll-index="1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="section-title text-center mb-30">
                        <h1 class="mb-25  wow fadeInUp" data-wow-delay=".2s">Our <span> Investments</span></h1>
                        <p class="wow fadeInUp" data-wow-delay=".4s">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Veritatis error enim perspiciatis iste dignissimos tempore?</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="single-feature wow fadeInUp" data-wow-duration="3s" data-wow-delay="0.2s">
                        <div class="icon color-1">
                            <i class="fas fa-hand-pointer"></i>
                        </div>
                        <div class="content">
                            <h3>Government Securities</h3>
                            <p>

                                Our seasoned team adeptly navigates fixed income investments, capitalizing on government bonds' yield potential. NICOL has demonstrated its commitment, TZS 14 billion to these bonds, showcasing confidence in their stability and enduring value.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-feature wow fadeInUp" data-wow-duration="3s" data-wow-delay="0.4s">
                        <div class="icon color-2">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <div class="content">
                            <h3>Equity</h3>
                            <p>
                                Our team of seasoned investment professionals is well-positioned to identify value across listed companies.
                                In our portfolio, NICOL PLC has Invested over TZS 50 billion in 9 listed companies.
                                In our portfolio, NICOL has invested over TZS 60 billion in 9 companies listed at the stock market.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-feature wow fadeInUp" data-wow-duration="3s" data-wow-delay="0.6s">
                        <div class="icon color-3">
                            <i class="fas fa-stethoscope"></i>
                        </div>
                        <div class="content">
                            <h3>Real Estate</h3>
                            <p>
                                Tanzania’s real estate sector is mainly driven by strong and
                                sustainable growth and the fast-growing Tanzanian population
                                estimated to be 61 million people. NICOL PLC has invested over
                                TZS 1 billion in the real estate sector to capture the increasing demand in the urban housing market.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ------- Feature Section End ---------- -->

    <!-- ----------- About Section Start --------- -->
    <section class="about-area pt-70 pb-120" data-scroll-index="2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-image wow fadeInLeftBig" data-wow-duration="3s" data-wow-delay="0.5s">
                        <div class="about-shape"></div>
                        <!-- <img src="assets/img/about/about-app.png" alt="" class="app"> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content mt-50 wow fadeInRightBig" data-wow-duration="3s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <h1 class="title">We’re a global stakeholder relation and investment company.</h1>
                            <p class="text">NICOL was initially formed in 1999 . Its main goal is to economically empower
                                ordinary citizens by acquiring a stake in the
                                economy of Tanzania through joint ownership in viable economic ventures.</p>
                        </div>

                        <a class="main-btn" href="tel:<a%20href=&quot;tel:(+255)%2022%202111399%20%20682%20720%20679&quot;>(+255)%2022%202111399</a>">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ----------- About Section End --------- -->

    <!-- ----------- Testimonial Section Start ------- -->
    <section class="testimonial-section" data-scroll-index="3">
        <div class="container">
            <div class="row justify-content-center testimonial-active-wrapper">
                <div class="col-xl-6 col-lg-7">
                    <div class="section-title text-center mb-60">
                        <h1 class="mb-25 text-white wow fadeInUp" data-wow-delay=".2s">What Our Clients Say</h1>
                        <p class="text-white wow fadeInUp" data-wow-delay=".4s">Working with this team has been an exceptional experience.
                            Their commitment to excellence, attention to detail,
                            and unwavering dedication to client satisfaction are truly commendable. From start to finish, they exceeded our expectations,
                            delivering outstanding results.</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8">
                        <div class="testimonial-active">
                            <div class="testimonial-wrapper">
                                <div class="single-testimonial">
                                    <div class="info">
                                        <div class="image-2">
                                            <img src="assets/img/testemonial/test-1.jpg" alt="">
                                        </div>
                                        <h4>HAMZA AZIZ</h4>
                                        <p>RETIRED SPECIAL FORCE</p>
                                        <div class="quote">
                                            <i class="fas fa-quote-right"></i>
                                        </div>
                                        <div class="content">
                                            <p>Transitioning from a career in the military to civilian life can be challenging, but this company has provided me with a sense of purpose and a community that feels like a second family. The values of discipline, teamwork,
                                                and integrity that were instilled in me during my service are mirrored in the ethos of this organization. <span>THANK TO NICOL</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-wrapper">
                                <div class="single-testimonial">
                                    <div class="info">
                                        <div class="image-2">
                                            <img src="assets/img/testemonial/test-2.jpg" alt="">
                                        </div>
                                        <h4>GABRIEL KIMARIO</h4>
                                        <p>ENTREPRENEUR</p>
                                        <div class="quote">
                                            <i class="fas fa-quote-right"></i>
                                        </div>
                                        <div class="content">
                                            <p>As a proud shareholder, I have experienced firsthand the unwavering
                                                commitment and dedication of this company. The strategic vision and transparent communication
                                                from the leadership team have instilled confidence in our investment.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- ----------- Testimonial Section End ------- -->


    <!-- ----------- FAQ Section Start --------- -->
    <section class="faq-section pt-120" data-scroll-index="5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7">
                    <div class="section-title text-center mb-60">
                        <h1 class="mb-25 wow fadeInUp" data-wow-delay=".2s">Frequencty <span> Asked Queries</span></h1>
                        <p class="mb-25 wow fadeInUp" data-wow-delay=".4s">People also ask..</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="accordion wow fadeInLeftBig" id="accordionExample" data-wow-duration="3s" data-wow-delay="0.5s">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        How can I become a stakeholder in the company?
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam, alias corrupti similique fugit
                                        commodi deserunt praesentium nisi expedita voluptatum dolores.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        What are the benefits of being a stakeholder?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta labore veniam ipsam dolore illo
                                        pariatur maiores neque debitis consectetur fugit?
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        How are dividends distributed to stakeholders?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio nulla possimus excepturi quas natus
                                        animi laudantium nihil ea ipsam reprehenderit?
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        How can I stay informed about company updates and performance?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio nulla possimus excepturi quas natus
                                        animi laudantium nihil ea ipsam reprehenderit?
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        What is the process for selling or transferring my shares?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio nulla possimus excepturi quas natus
                                        animi laudantium nihil ea ipsam reprehenderit?
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="faq-image wow fadeInRightBig" data-wow-duration="3s" data-wow-delay="0.5s">
                            <img src="assets/img/faq/faq-img.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- ----------- FAQ Section End --------- -->
    <!-- ----------- Download Section Start ------- -->
    <!-- <section class="download-area pt-70 pb-40" data-scroll-index="6">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-9">
                    <div class="download-image mt-50 wow fadeInLeftBig" data-wow-duration="3s" data-wow-delay="0.5s">
                        <div class="download-shape-1"></div>
                        <img src="assets/img/download/download-app.png" class="image-3">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="download-content mt-45 wow fadeInRightBig" data-wow-duration="3s" data-wow-delay="0.5s">
                        <h1 class="title">Download and Start Using!</h1>
                        <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam eligendi voluptatem quae
                            deserunt laudantium qui nisi? Cum voluptatibus quidem officiis nam placeat unde eaque totam!</p>
                        <ul>
                            <li><a href="" class="app-store">
                                    <img src="assets/img/download/app-store.png" alt="">
                                </a></li>
                            <li><a href="" class="play-store">
                                    <img src="assets/img/download/play-store.png" alt="">
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- ----------- Download Section End ------- -->
    <!-- --------------Footer Section Start ------- -->
    <footer class="footer-area">
        <div class="footer-shape shape-1"></div>
        <div class="footer-shape shape-2"></div>
        <div class="footer-shape shape-3"></div>
        <div class="footer-shape shape-4"></div>
        <div class="footer-shape shape-5"></div>
        <div class="footer-shape shape-6"></div>
        <div class="footer-widget pt-30 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-about mt-50">
                            <a>
                                <img width="223" height="73" src="https://nicol.co.tz/wp-content/uploads/2019/10/FOOER-GOOdj-jerry.png" class="attachment-full" alt="">
                            </a>
                            <p class="text">
                                We’re a global stakeholder relation and investment company.
                            </p>
                            <ul class="social">
                                <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                <li><a href=""><i class="fab fa-instagram"></i></a></li>
                                <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="footer-link d-flex flex-wrap">
                            <div class="footer-link-wrapper mt-45">
                                <div class="footer-title">
                                    <h4 class="title">Quick Links</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="">Home</a></li>

                                    <li><a href="">About</a></li>
                                    <li><a href="">Testimonial</a></li>

                                    <!-- <li><a href="">Download</a></li> -->
                                </ul>
                            </div>
                            <div class="footer-link-wrapper mt-45">
                                <div class="footer-title">
                                    <h4 class="title">Support</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="">FAQ</a></li>
                                    <li><a href="">Privacy Policy</a></li>
                                    <li><a href="">Terms OF Use</a></li>

                                    <li><a href="">Site Map</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-contact mt-45">
                            <div class="footer-title">
                                <h4 class="title">Quick Links</h4>
                            </div>
                            <ul class="contact-list">
                                <li>
                                    <div class="contact-info">
                                        <div class="info-content media-body">
                                            <p class="text"><i class="fas fa-phone-alt"></i>
                                                +255 768 008 800 or +255 733 006 177
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-info">
                                        <div class="info-content media-body">
                                            <p class="text"><a href=""><i class="far fa-envelope"></i>
                                                    invest@nicol.co.tz</a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-info">
                                        <div class="info-content media-body">
                                            <p class="text"><a href=""><i class="fas fa-globe"></i>
                                                    www.nicol.co.tz </a></p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-info">
                                        <div class="info-content media-body">
                                            <p class="text"><i class="fas fa-map-marker-alt"></i>
                                                Head Office
                                                50 Mirambo Street, Dar es salaam
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="lo-lg-12">
                        <div class="copyright">
                            <div class="copyright-text text-center">
                                <p class="text"> <a href="">2023 © All rights reserved by NICOL | Designed By Getcore Group</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- --------------Footer Section End ------- -->
    <!-- ---- jquery Js ---- -->
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <!-- -------- venobox js ------ -->
    <script type="text/javascript" src="assets/js/venobox.min.js"></script>
    <!-- ---------- wow js ---------- -->
    <script src="assets/js/wow.min.js"></script>
    <!-- ---------- tiny slider js --------- -->
    <script src="assets/js/tiny-slider.js"></script>
    <!-- ---------- scrollit js ---------- -->
    <script src="assets/js/scrollIt.min.js"></script>
    <!-- -------- font awsome js --------- -->
    <script src="assets/js/all.js"></script>
    <!-- ---- Bootstrap Js ---- -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- ---- main js --- -->
    <script src="assets/js/main.js"></script>
</body>

</html>
