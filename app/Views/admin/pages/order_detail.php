<?= $this->extend('admin/layouts/template') ?>

<?= $this->section('content') ?>

<div class="card">

    <div class="card-header">

        <h3 class="card-title">
            Detail Order
        </h3>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="200">Invoice</th>
                <td><?= $order['invoice'] ?></td>
            </tr>

            <tr>
                <th>Payment Method</th>
                <td><?= $order['payment_method'] ?></td>
            </tr>

            <tr>
                <th>Payment Status</th>
                <td><?= $order['payment_status'] ?></td>
            </tr>

            <tr>
                <th>Order Status</th>
                <td><?= $order['order_status'] ?></td>
            </tr>

            <tr>
                <th>Total</th>
                <td>
                    Rp <?= number_format($order['grand_total'],0,',','.') ?>
                </td>
            </tr>

        </table>

    </div>

</div>

<div class="card">

    <div class="card-header">
        <h3 class="card-title">
            Produk
        </h3>
    </div>

    <div class="card-body">

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

                <?php foreach($details as $item) : ?>

                <tr>

                    <td>
                        <?= $item['product_name'] ?>
                    </td>

                    <td>
                        Rp <?= number_format($item['product_price'],0,',','.') ?>
                    </td>

                    <td>
                        <?= $item['qty'] ?>
                    </td>

                    <td>
                        Rp <?= number_format($item['subtotal'],0,',','.') ?>
                    </td>

                </tr>

                <?php endforeach ?>

            </tbody>

        </table>

    </div>

</div>

<?= $this->endSection() ?>