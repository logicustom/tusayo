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
                                <li><i class="fa fa-envelope"></i> hello@tokoonline.com</li>
                                <li>Free Shipping for all Order of 7rb</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-tiktok"></i></a>
                            </div>
                            <!--
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            -->
                            <div class="header__top__right__auth">
                                <a href="<?= base_url('login') ?>"><i class="fa fa-user"></i> Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.html"><img src="<?= base_url('public/assets/img/logo2.png') ?>" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="<?= ($active == 'home') ? 'active' : '' ?>">
                                <a href="<?= base_url('home') ?>">Home</a>
                            </li>
                            <li class="<?= ($active == 'shop') ? 'active' : '' ?>">
                                <a href="<?= base_url('shop') ?>">Shop</a>
                            </li>
                            <li class="<?= ($active == 'order') ? 'active' : '' ?>">
                                <a href="#">Order</a>
                                <ul class="header__menu__dropdown">
                                    <li>
                                        <a href="<?= base_url('order') ?>">
                                            Order History
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('cart') ?>">
                                            Cart
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('checkout') ?>">
                                            Checkout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?= ($active == 'blog') ? 'active' : '' ?>">
                                <a href="<?= base_url('blogs') ?>">Blog</a>
                            </li>
                            <li class="<?= ($active == 'contact') ? 'active' : '' ?>">
                                <a href="<?= base_url('contact') ?>">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li>
                            <?php
                            $cart  = session()->get('cart') ?? [];
                            $count = 0;
                            $total = 0;
                            foreach($cart as $item){
                                $count += $item['qty'];
                                $subtotal = $item['price'] * $item['qty'];
                                $total += $subtotal;
                            }
                            ?>
                            <a href="<?= base_url('cart') ?>"><i class="fa fa-shopping-bag"></i> <span><?= $count ?></span></a>
                        
                            </li>
                        </ul>
                        <div class="header__cart__price">item: <span>Rp <?= number_format($total,0,',','.') ?></span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
