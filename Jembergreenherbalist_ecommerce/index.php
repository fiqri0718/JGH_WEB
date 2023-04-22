<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--=============== FAVICON ===============-->
    <link rel="shortcut icon" href="assets/img/tanpaNO.png" type="image/x-icon">

    <!--=============== REMIX ICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">


    <title>Jember Green Herbalist</title>
</head>

<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <nav class="nav container">
            <a href="#" class="nav__logo"> Jember Green Herbalist
            </a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">Beranda</a>
                    </li>
                    <li class="nav__item">
                        <a href="#about" class="nav__link">Tentang</a>
                    </li>
                    <li class="nav__item">
                        <a href="produk.php" class="nav__link">produk</a>
                    </li>
                    <li class="nav__item">
                        <a href="#portfolio" class="nav__link">Galeri</a>
                    </li>
                    <li class="nav__item">
                        <a href="#contact" class="nav__link">Kontak Kami</a>
                    </li>
                </ul>
                <div class="nav__close" id="nav-close">
                    <i class="ri-close-line"></i>
                </div>
            </div>

            <div class="nav__btns">
                <!-- Theme change button -->
                <i class="ri-moon-line change-theme" id="theme-button"></i>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line"></i>
                </div>
            </div>
        </nav>
    </header>

    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home" id="home">
            <div class="home__container container grid">
                <img src="assets/img/g39141.png" alt="" class="home__img">

                <div class="home__data">
                    <h1 class="home__title">
                        JEMBER <br> GREEN HERBALIST
                    </h1>
                    <p class="home__description">
                        Temukan berbagai ekstrak jamu tradisional yang memiliki banyak manfaat untuk kesehatan kita
                        semua
                    </p>
                    <a href="#about" class="button button--flex">
                        Explore <i class="ri-arrow-right-down-line button__icon"></i>
                    </a>
                </div>

                <div class="home__social">
                    <span class="home__social-follow">Follow Us</span>

                    <div class="home__social-links">
                        <a href="https://web.facebook.com/jember.g.herbalist?_rdc=1&_rdr" target="_blank"
                            class="home__social-link">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/greenherbalist.jember/?hl=id" target="_blank"
                            class="home__social-link">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="https://t.me/s/JbrGH?before=137" target="_blank" class="home__social-link">
                            <i class="ri-telegram-fill"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!--==================== ABOUT ====================-->
        <section class="about section container" id="about">
            <div class="about__container grid">
                <img src="assets/img/about.png" alt="" class="about__img">
                <!--Belom ada gambar-->
                <div class="about__data">
                    <h2 class="section__title about__title">
                        Tentang <br> Jember Green Herbalist
                    </h2>

                    <p class="about__description">
                        Green Herbalist merupakan agen produk ekstrak jamu tradisional yang berkualitas dan harga
                        terjangkau. Berbagai produk yang tersedia di green Herbalis adalah ekstrak temulawak, ekstrak
                        jahe, ekstrak kunir, ekstrak mengkudu dan berbagai jenis jamu tradisional lainnya. Dengan
                        mengkonsumsi green Herbalist dapat membantu menjaga kesehatan dan imunitas anda
                        Perusahaan Jember Green Herbalist (JGH) membuka Peluang usaha bagi Masyarakat Indonesia untuk
                        menjadi Agen-agen Nusantara JGH.
                    </p>

                    <div class="about__details">
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Kami selalu menyiapkan bahan yang memiliki kualitas sangat tingi
                        </p>
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Pembayaran yang sanagat mudah
                        </p>
                        <p class="about__details-description">
                            <i class="ri-checkbox-fill about__details-icon"></i>
                            Produk kami memiliki banyak manfaat dan menjaga tubuh kita disaat pandemi
                        </p>
                    </div>

                    <a href="produk.php" class="button--link button--flex">
                        Shop Now <i class="ri-arrow-right-down-line button__icon"></i>
                    </a>
                </div>
            </div>
        </section>

        <!--==================== STEPS ====================-->
        <section class="steps section container">
            <div class="steps__bg">
                <h2 class="section__title-center steps__title">
                    Fitur-Fitur <br> Unggulan
                </h2>

                <div class="steps__container grid">
                    <div class="steps__card">
                        <div class="steps__card-number"><i class="ri-truck-fill"></i></div>
                        <h3 class="steps__card-title">Pengiriman</h3>
                        <p class="steps__card-description">
                            Kami menyediakan pengiriman online dengan ekspidisi yang ada dan bisa datang ke gerai kami
                        </p>
                    </div>

                    <div class="steps__card">
                        <div class="steps__card-number"><i class="ri-shopping-basket-fill"></i></div>
                        <h3 class="steps__card-title">Belanja</h3>
                        <p class="steps__card-description">
                            Kami mempermudah proses pemesanan produk, terutama dalam mencari produk herbal
                        </p>
                    </div>

                    <div class="steps__card">
                        <div class="steps__card-number"><i class="ri-bank-card-fill"></i></div>
                        <h3 class="steps__card-title">pembayaran</h3>
                        <p class="steps__card-description">
                            Kami menyediakan pembayaran via transfer bank dan pembayaran sejenisnya
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!--==================== PRODUCTS ====================-->
        <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="section-title">
                    <center><h2>Galeri</h2></center>
                </div>

                <div class="row portfolio-container">
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/img1 (1).jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/img1 (1).jpg" data-gall="portfolioGallery"
                                        class="venobox"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="assets/img/img1 (2).jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/img1 (2).jpg" data-gall="portfolioGallery"
                                        class="venobox"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/img1 (3).jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/img1 (3).jpg" data-gall="portfolioGallery"
                                        class="venobox"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="assets/img/img1 (4).jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/img1 (4).jpg" data-gall="portfolioGallery"
                                        class="venobox"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="assets/img/img1 (5).jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/img1 (5).jpg" data-gall="portfolioGallery"
                                        class="venobox"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="assets/img/img1 (6).jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/img1 (6).jpg" data-gall="portfolioGallery"
                                        class="venobox"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="assets/img/img1 (7).jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/img1 (7).jpg" data-gall="portfolioGallery"
                                        class="venobox"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="assets/img/img1 (8).jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/img1 (8).jpg" data-gall="portfolioGallery"
                                        class="venobox"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="assets/img/img1 (9).jpg" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <div class="portfolio-links">
                                    <a href="assets/img/img1 (9).jpg" data-gall="portfolioGallery"
                                        class="venobox"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--==================== CONTACT ====================-->
        <section class="contact section container" id="contact">
            <div class="contact__container grid">
                <div class="contact__box">
                    <h2 class="section__title">
                        Kontak Kami <br> JIka Membutuhkan Informasi <br>
                    </h2>

                    <div class="contact__data">
                        <div class="contact__information">
                            <h3 class="contact__subtitle">Telepon</h3>
                            <span class="contact__description">
                                <i class="ri-phone-line contact__icon"></i>
                                0821 3246 8686
                            </span>
                        </div>

                        <div class="contact__information">
                            <h3 class="contact__subtitle">Email Kami</h3>
                            <span class="contact__description">
                                <i class="ri-mail-line contact__icon"></i>
                                greenherbalist.jember@gmail.com
                            </span>
                        </div>
                    </div>
                </div>

                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="form-group">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.392375404804!2d113.72372631398174!3d-8.16316439412433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd69566a5923235%3A0xdd9ecd9207b2be73!2zSkVNQkVSIEdSRUVOIEhFUkJBTElTVCDwn4eu8J-HqfCfjL8!5e0!3m2!1sen!2sid!4v1636808236914!5m2!1sen!2sid"
                            width="500" height="320" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <!--==================== FOOTER ====================-->
    <footer class="footer section">
        <div class="footer__container container grid">
            <div class="footer__content">
                <a href="#" class="footer__logo">
                    <i class=""></i> Jember Green Herbalist
                </a>

                <h3 class="footer__title">
                    Silahkan Daftar
                </h3>

                <div class="footer__subscribe">
                    <input type="email" placeholder="Enter your email" class="footer__input">

                    <button class="button button--flex footer__button">
                        Daftar
                        <i class="ri-arrow-right-up-line button__icon"></i>
                    </button>
                </div>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Alamat Kami</h3>

                <ul class="footer__data">
                    <li class="footer__information">Jl. Kaliurang No.63, Krajan Barat, Sumbersari, Kec. Sumbersari,Kabupaten Jember, Jawa Timur 68121
                    </li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Kontak Kami</h3>

                <ul class="footer__data">
                    <li class="footer__information">0821 3246 8686</li>

                    <div class="footer__social">
                        <a href="https://web.facebook.com/jember.g.herbalist?_rdc=1&_rdr" class="footer__social-link">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="https://www.instagram.com/greenherbalist.jember/?hl=id" class="footer__social-link">
                            <i class="ri-instagram-line"></i>
                        </a>
                        <a href="https://t.me/s/JbrGH?before=137" class="footer__social-link">
                            <i class="ri-telegram-fill"></i>
                        </a>
                    </div>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">
                    metode pembayaran
                </h3>

                <div class="footer__cards">
                    <img src="assets/img/bank1.png" alt="" class="footer__card">
                    <img src="assets/img/bank2.png" alt="" class="footer__card">
                    <img src="assets/img/bank3.png" alt="" class="footer__card">
                    <img src="assets/img/bank4.png" alt="" class="footer__card">
                </div>
            </div>
        </div>

        <p class="footer__copy">&#169; JGH TEAM. All rigths reserved</p>
    </footer>

    <!--=============== SCROLL REVEAL ===============-->
    <script src="assets/js/scrollreveal.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main1.js"></script>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

</body>

</html>