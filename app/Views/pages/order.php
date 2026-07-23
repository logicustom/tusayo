<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<section class="breadcrumb-section set-bg"
    data-setbg="<?= base_url('public/assets/img/breadcrumb.jpg') ?>">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Order</h2>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="spad">
    <div class="container">
        <div class="table-responsive">
            <table id="orderTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="text-align:center;">Invoice</th>
                        <th style="text-align:center;">Tanggal</th>
                        <th style="text-align:center;">Total</th>
                        <th style="text-align:center;">Pembayaran</th>
                        <th style="text-align:center;">Status Order</th>
                        <th style="text-align:center;" width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orders as $row): ?>
                    <tr>
                        <td style="text-align:center;"><?= $row['invoice'] ?></td>
                        <td style="text-align:center;">
                            <?= date('d M Y H:i', strtotime($row['created_at'])) ?>
                        </td>
                        <td style="text-align:right;">
                            Rp <?= number_format($row['grand_total'],0,',','.') ?>
                        </td>
                        <td style="text-align:center;">
                            <?php
                            $badge = [
                                'paid'    => 'success',
                                'pending' => 'warning',
                                'failed'  => 'danger',
                                'expired' => 'secondary'
                            ];
                            ?>
                            <span class="badge badge-<?= $badge[$row['payment_status']] ?? 'info' ?>">
                                <?= strtoupper($row['payment_status']) ?>
                            </span>
                        </td>
                        <td style="text-align:center;">
                            <span class="badge badge-info">
                                <?= strtoupper($row['order_status']) ?>
                            </span>
                        </td>
                        <td style="text-align:center;">
                            <a href="<?= base_url('order/'.$row['invoice']) ?>"
                            class="btn btn-sm btn-primary">
                                Detail
                            </a>
                            <?php if($row['payment_status'] == 'pending'): ?>
                                <a href="<?= base_url('payment/'.$row['id']) ?>"
                                class="btn btn-sm btn-success">
                                    Bayar
                                </a>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?= $this->endSection() ?>