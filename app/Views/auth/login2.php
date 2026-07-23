<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $title ?? 'E-Commerce' ?></title>

<link rel="stylesheet" href="<?= base_url('public/assets/css/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/assets/css/font-awesome.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/assets/css/elegant-icons.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/assets/css/nice-select.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/assets/css/jquery-ui.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/assets/css/owl.carousel.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/assets/css/slicknav.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/assets/css/style.css') ?>">

</head>

<body>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="<?= base_url('login') ?>"><i class="fa fa-user"></i> Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <!-- Header Section End -->



    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">

            <div class="checkout__form">
                <h4>Tokoonline -  Log In</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Log In</h4>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="checkout__input">
                                            <p>Username/Email<span>*</span></p>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="checkout__input">
                                            <p>Password<span>*</span></p>
                                            <input type="text">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="site-btn">LOG IN</button>
                                </form>
                                <div class="checkout__order__subtotal"></div>        
                                <div class="checkout__order__total"><center>Atau</center></div>
                                <a href='<?= base_url('google/login') ?>' class="site-btn"><i class="fa fa-google"></i> Google</a>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->


      <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->


    <script src="<?= base_url('public/assets/js/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/jquery.nice-select.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/jquery-ui.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/jquery.slicknav.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/mixitup.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/main.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

</body>
</html>