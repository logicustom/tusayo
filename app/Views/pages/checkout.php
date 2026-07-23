<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<section class="breadcrumb-section set-bg"
    data-setbg="<?= base_url('public/assets/img/breadcrumb.jpg') ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="<?= base_url() ?>">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout spad">
    <div class="container">

        <div class="checkout__form">

            <h4>Billing Details</h4>

            <form action="<?= base_url('checkout/process') ?>" method="post">

                <?= csrf_field() ?>

                <div class="row">

                    <!-- FORM CUSTOMER -->
                    <div class="col-lg-8 col-md-6">

                        <div class="checkout__input">
                            <p>Nama Lengkap <span>*</span></p>
                            <input type="text"
                                   name="customer_name"
                                   required>
                        </div>

                        <div class="checkout__input">
                            <p>Email <span>*</span></p>
                            <input type="email"
                                   name="email"
                                   required>
                        </div>

                        <div class="checkout__input">
                            <p>No. HP <span>*</span></p>
                            <input type="text"
                                   name="phone"
                                   required>
                        </div>

                        <div class="checkout__input">
                            <p>Alamat Lengkap <span>*</span></p>
                            <input type="text"
                                   name="address"
                                   class="checkout__input__add"
                                   required>
                        </div>

                        <div class="checkout__input">
                            <p>Kota <span>*</span></p>
                            <input type="text"
                                   name="city"
                                   required>
                        </div>

                        <div class="checkout__input">
                            <p>Kode Pos</p>
                            <input type="text"
                                   name="postal_code">
                        </div>

                        <div class="checkout__input">
                            <p>Catatan Pesanan</p>
                            <input type="text"
                                   name="notes"
                                   placeholder="Contoh: kirim sore hari">
                        </div>

                    </div>

                    <!-- ORDER SUMMARY -->
                    <div class="col-lg-4 col-md-6">

                        <div class="checkout__order">

                            <h4>Pesanan Anda</h4>

                            <div class="checkout__order__products">
                                Produk
                                <span>Total</span>
                            </div>

                            <ul>

                                <?php foreach($cart as $item): ?>

                                    <li>

                                        <?= esc($item['name']) ?>

                                        x <?= $item['qty'] ?>

                                        <span>
                                            Rp <?= number_format(
                                                $item['price'] * $item['qty'],
                                                0,
                                                ',',
                                                '.'
                                            ) ?>
                                        </span>

                                    </li>

                                <?php endforeach ?>

                            </ul>

                            <div class="checkout__order__subtotal">

                                Subtotal

                                <span>
                                    Rp <?= number_format(
                                        $subtotal,
                                        0,
                                        ',',
                                        '.'
                                    ) ?>
                                </span>

                            </div>

                            <div class="checkout__order__subtotal">

                                Ongkir

                                <span>
                                    Rp 0
                                </span>

                            </div>

                            <div class="checkout__order__total">

                                Grand Total

                                <span>
                                    Rp <?= number_format(
                                        $subtotal,
                                        0,
                                        ',',
                                        '.'
                                    ) ?>
                                </span>

                            </div>

                            <div class="checkout__input__checkbox">
                                <label>
                                    Saya setuju dengan syarat & ketentuan
                                    <input type="checkbox" required>
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            <button type="submit"
                                    class="site-btn">

                                LANJUTKAN PEMBAYARAN

                            </button>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>
</section>

<?= $this->endSection() ?>