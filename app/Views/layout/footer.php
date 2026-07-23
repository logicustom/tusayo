 <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="<?= base_url() ?>">
                                <img src="<?= base_url('public/assets/img/logo2.png') ?>" alt="Tokoonline">
                            </a>
                        </div>

                        <ul>
                            <li>
                                <b>Alamat:</b>
                                <?= $setting['address'] ?>
                            </li>

                            <li>
                                <b>Telepon:</b>
                                <?= $setting['phone'] ?>
                            </li>

                            <li>
                                <b>Email:</b>
                                <?= $setting['email'] ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Menu</h6>

                        <ul>
                            <li><a href="<?= base_url('/') ?>">Home</a></li>
                            <li><a href="<?= base_url('shop') ?>">Produk</a></li>
                            <li><a href="<?= base_url('cart') ?>">Keranjang</a></li>
                            <li><a href="<?= base_url('contact') ?>">Kontak</a></li>
                        </ul>

                        <ul>
                            <li><a href="<?= base_url('about') ?>">Tentang Kami</a></li>
                            <li><a href="<?= base_url('order') ?>">Pesanan Saya</a></li>
                            <li><a href="<?= base_url('privacy') ?>">Kebijakan Privasi</a></li>
                            <li><a href="<?= base_url('terms') ?>">Syarat & Ketentuan</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Hubungi Kami</h6>

                        <p>
                            Melayani kebutuhan buah, sayur, daging, seafood dan kebutuhan harian berkualitas.
                        </p>

                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="https://wa.me/62812xxxxxxx" target="_blank"><i class="fa fa-whatsapp"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->


    <script src="<?= base_url('public/assets/js/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/jquery.nice-select.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/jquery-ui.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/jquery.slicknav.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/mixitup.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/owl.carousel.min.js') ?>"></script>
    <script src="<?= base_url('public/assets/js/main.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js"></script>
<script>

$(function(){

    $(document).on('submit', '.add-cart-form', function(e){

        e.preventDefault();

        let form = $(this);

        $.ajax({

            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            dataType: 'json',

            success: function(res){
                $('.cart-count').html(res.count);
                Swal.fire({
                    icon:'success',
                    title:'Produk ditambahkan',
                    timer:1500,
                    showConfirmButton:false
                });

            }

        });

    });

});

</script>

<script>
$(document).ready(function(){

    $('#orderTable').DataTable({

        order: [[1, 'desc']],

        pageLength: 10,

        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
            paginate: {
                previous: "Sebelumnya",
                next: "Berikutnya"
            },
            zeroRecords: "Data tidak ditemukan"
        }

    });

});
</script>
</body>
</html>