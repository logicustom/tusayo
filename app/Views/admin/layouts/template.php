<!DOCTYPE html>
<html lang="en">

<?= $this->include('admin/layouts/header') ?>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

<div class="app-wrapper">

    <?= $this->include('admin/layouts/navbar') ?>

    <?= $this->include('admin/layouts/sidebar') ?>

    <main class="app-main">
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('admin/layouts/footer') ?>

</div>

</body>
</html>