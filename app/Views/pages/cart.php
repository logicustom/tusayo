<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<section class="shoping-cart spad">
    <div class="container">
    <?php
    $total = 0;
    ?>
    <form action="<?= base_url('cart/update') ?>" method="post">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                <table>
                    <thead>
                    <tr>
                        <th class="shoping__product">Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                    </thead>
                <tbody>
                <?php if(!empty($cart)): ?>
                <?php foreach($cart as $item): ?>
                <?php
                $subtotal = $item['price'] * $item['qty'];
                $total += $subtotal;
                ?>
                    <tr>
                        <td class="shoping__cart__item"><h5><?= esc($item['name']) ?></h5></td>
                        <td class="shoping__cart__price">Rp <?= number_format($item['price'],0,',','.') ?></td>
                        <td class="shoping__cart__quantity"><input type="number" name="qty[<?= $item['id'] ?>]" value="<?= $item['qty'] ?>"
                min="1" class="form-control"></td>
                        <td class="shoping__cart__total">Rp <?= number_format($subtotal,0,',','.') ?></td>
                        <td class="shoping__cart__item__close">
                            <a href="<?= base_url('cart/remove/'.$item['id']) ?>"><span class="icon_close"></span></a>
                        </td>
                    </tr>
                <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Keranjang masih kosong</td>
                    </tr>
                <?php endif ?>
                    </tbody>
                </table>
                </div>
                </div>
                </div>
                <div class="row">
                <div class="col-lg-6">
                <button type="submit" class="primary-btn">UPDATE CART</button>
                </div>
                <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Total <span>Rp <?= number_format($total,0,',','.') ?></span></li>
                    </ul>
                    <a href="<?= base_url('checkout') ?>" class="primary-btn"> PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </form>
    </div>
</section>
<?= $this->endSection() ?>