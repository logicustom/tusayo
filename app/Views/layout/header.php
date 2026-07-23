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
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap4.min.css">
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
                                <li>Free Shipping for all Order of Rp 7rb</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-intagram"></i></a>

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

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Category</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5><?= $setting['phone'] ?></h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->