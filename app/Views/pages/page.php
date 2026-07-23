

<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<section class="breadcrumb-section set-bg"
    data-setbg="<?= base_url('public/assets/img/breadcrumb.jpg') ?>">

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2><?= $page['title'] ?></h2>
                </div>
            </div>
        </div>
    </div>

</section>

<section class="spad">
    <div class="container">

        <?= $page['content'] ?>

    </div>
</section>
<?= $this->endSection() ?>