<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<section class="breadcrumb-section set-bg"
    data-setbg="<?= base_url('public/assets/img/breadcrumb.jpg') ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Order Success</h2>
                    <div class="breadcrumb__option">
                        <a href="<?= base_url() ?>">Home</a>
                        <span>Order Success</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout spad">
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card shadow">

                    <div class="card-body text-center">

                        <i class="fa fa-check-circle text-success"
                           style="font-size:80px;"></i>

                        <h2 class="mt-4">
                            Pembayaran Berhasil
                        </h2>

                        <p>
                            Terima kasih telah berbelanja.
                        </p>

                        <hr>

                        <h5>
                            Invoice :
                            <?= esc($order['invoice']) ?>
                        </h5>

                        <h5>
                            Status :
                            <span class="badge badge-success">
                                <?= strtoupper($order['payment_status']) ?>
                            </span>
                        </h5>

                        <h4 class="mt-3">

                            Rp <?= number_format(
                                $order['grand_total'],
                                0,
                                ',',
                                '.'
                            ) ?>

                        </h4>

                    </div>

                </div>

                <div class="card mt-4">

                    <div class="card-header">

                        Detail Pesanan

                    </div>

                    <div class="card-body">

                        <table class="table">

                            <thead>

                            <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>

                            </thead>

                            <tbody>

                            <?php foreach($details as $item): ?>

                                <tr>

                                    <td>
                                        <?= esc($item['product_name']) ?>
                                    </td>

                                    <td>
                                        Rp <?= number_format(
                                            $item['product_price'],
                                            0,
                                            ',',
                                            '.'
                                        ) ?>
                                    </td>

                                    <td>
                                        <?= $item['qty'] ?>
                                    </td>

                                    <td>
                                        Rp <?= number_format(
                                            $item['subtotal'],
                                            0,
                                            ',',
                                            '.'
                                        ) ?>
                                    </td>

                                </tr>

                            <?php endforeach ?>

                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="text-center mt-4">

                    <a href="<?= base_url('shop') ?>"
                       class="primary-btn">

                        LANJUT BELANJA

                    </a>

                </div>

            </div>

        </div>

    </div>
</section>

<?= $this->endSection() ?>