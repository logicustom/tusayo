<?= $this->extend('admin/layouts/template') ?>

<?= $this->section('content') ?>
<?php if(session()->getFlashdata('errors')) : ?>

<div class="alert alert-danger">

    <ul class="mb-0">

        <?php foreach(session()->getFlashdata('errors') as $error): ?>

            <li><?= esc($error) ?></li>

        <?php endforeach; ?>

    </ul>

</div>

<?php endif; ?>
<div class="card">

    <div class="card-header">
        <h3 class="card-title">
            User
        </h3>
    </div>

    <form action="<?= base_url('users/save') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div class="card-body">

            <div class="mb-3">
                <label>Nama</label>
                <input type="text"
                    name="name"
                    class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email"
                    name="email"
                    class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label>Phone</label>
                <input type="text"
                    name="phone"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password"
                    name="password"
                    class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label>Role</label>

                <select name="role" class="form-select">
                    <option value="admin">
                        Admin
                    </option>

                    <option value="superadmin">
                        Super Admin
                    </option>
                    <option value="customer">
                        Customer
                    </option>
                </select>

            </div>


        </div>

        <div class="card-footer">

            <button type="submit"
                class="btn btn-success">

                SAVE

            </button>

            <a href="<?= base_url('admin/users') ?>"
                class="btn btn-secondary">

                BACK

            </a>

        </div>

    </form>

</div>
<?= $this->endSection() ?>