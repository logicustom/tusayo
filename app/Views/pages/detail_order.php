<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<section class="spad">

<div class="container">
  <hr>
    <h3>
        Invoice :
        <?= $order['invoice'] ?>
    </h3>

    <hr>

    <div class="row">

        <div class="col-md-6">

            <table class="table">

                <tr>
                    <th>Status Pembayaran</th>
                    <td><?= strtoupper($order['payment_status']) ?></td>
                </tr>

                <tr>
                    <th>Status Pesanan</th>
                    <td><?= strtoupper($order['order_status']) ?></td>
                </tr>

                <tr>
                    <th>Total</th>
                    <td>
                        Rp <?= number_format($order['grand_total']) ?>
                    </td>
                </tr>

            </table>

        </div>

    </div>

    <h4>Produk Dibeli</h4>

    <table class="table table-bordered">

        <thead>

        <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>

        </thead>

        <tbody>

        <?php foreach($details as $item): ?>

            <tr>

                <td>
                    <?= $item['product_name'] ?>
                </td>

                <td>
                    Rp <?= number_format($item['product_price']) ?>
                </td>

                <td>
                    <?= $item['qty'] ?>
                </td>

                <td>
                    Rp <?= number_format($item['subtotal']) ?>
                </td>

            </tr>

        <?php endforeach ?>

        </tbody>

    </table>

</div>

</section>

<?= $this->endSection() ?>