<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<div class="container py-5">

    <div class="card">

        <div class="card-body">

            <h3>Invoice</h3>

            <p><?= $order['invoice'] ?></p>

            <h4>

                Rp <?= number_format(
                    $order['grand_total'],
                    0,
                    ',',
                    '.'
                ) ?>

            </h4>

            <button
                id="pay-button"
                class="site-btn">

                BAYAR SEKARANG

            </button>

        </div>

    </div>

</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= $clientKey ?>"></script>

<script>

document
.getElementById('pay-button').onclick = function(){

snap.pay('<?= $snapToken ?>', {

    onSuccess: function(result){
        window.location.href = "<?= base_url('order/success/'.$order['invoice']) ?>";
    },

    onPending: function(result){
        Swal.fire({
            icon: 'info',
            title: 'Menunggu Pembayaran',
            text: 'Silakan selesaikan pembayaran Anda'
        });
    },

    onError: function(result){
        Swal.fire({
            icon: 'error',
            title: 'Pembayaran Gagal'
        });
    },

    onClose: function(){

        Swal.fire({
            icon: 'warning',
            title: 'Pembayaran Belum Selesai',
            text: 'Anda menutup popup pembayaran',
            confirmButtonText: 'Lanjutkan Pembayaran'
        });

    }

});

};

</script>

<?= $this->endSection() ?>