<?= $this->extend('layout/template_home') ?>

<?= $this->section('content') ?>
  <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Category</span>
                        </div>
                        <ul>
                            <?php foreach($categories as $cat): ?>
                            <li>
                            <a href="<?= base_url('category/'.$cat['slug']) ?>">
                            <?= esc($cat['name']) ?>
                            </a>
                            </li>
                            <?php endforeach ?>
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
                    <a href="shop">                 
                    <div class="hero__item set-bg" data-setbg="<?= base_url('public/assets/img/banner/banner1.png') ?>">
                        <div class="hero__text">
                            <span></span>
                            <h2></h2>
                            <p></p>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php foreach($categories as $cat): ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?= base_url('public/assets/img/categories/'. esc($cat['image'])) ?>">
                            <h5><a href="<?= base_url('category/'.$cat['slug']) ?>"><?= esc($cat['name']) ?></a></h5>
                        </div>
                    </div>
                      <?php endforeach ?>   
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">

                        <ul>
                            <?php foreach($categories as $cat): ?>
                            <li data-filter=".".<?= esc($cat['name']) ?>><?= esc($cat['name']) ?></li>
                            <?php endforeach ?>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php foreach($products as $row): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges <?= $row['category_name'] ?>">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?= base_url('public/assets/img/product/'.$row['image']) ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li>
                                    <form action="<?= base_url('cart/add') ?>" method="post" class="add-cart-form">
                                    <?= csrf_field() ?>
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <input type="hidden" name="name" value="<?= $row['name'] ?>">
                                        <input type="hidden" name="price" value="<?= $row['price'] ?>">
                                        <button type="submit" style="border:none;background:none;">
                                            <i class="fa fa-shopping-cart"></i>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="product__discount__item__text">
                            <span><?= $row['name'] ?></span>
                            <h5><a href="#"><?= $row['name'] ?></a></h5>
                            <div class="product__item__price">Rp <?= number_format($row['price']-($row['price']*$row['discount']/100)) ?><span>Rp <?= number_format($row['price']) ?></span></div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?> 
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?= base_url('public/assets/img/banner/banner_1.png') ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?= base_url('public/assets/img/banner/banner_2.png') ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin 
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking</a></h5>
                            <p>Sed quia</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Blog Section End -->
<?= $this->endSection() ?>