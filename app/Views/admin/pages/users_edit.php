<?= $this->extend('admin/layouts/template') ?>

<?= $this->section('content') ?>
<div class="card">

    <div class="card-header">
        <h3 class="card-title">
            Edit User
        </h3>
    </div>

    <form action="<?= base_url('users/update/' . $user['id']) ?>" method="post">

        <?= csrf_field() ?>

        <div class="card-body">

            <?php if(session()->getFlashdata('errors')) : ?>

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        <?php foreach(session()->getFlashdata('errors') as $error): ?>

                            <li><?= esc($error) ?></li>

                        <?php endforeach; ?>

                    </ul>

                </div>

            <?php endif; ?>

            <div class="mb-3">

                <label class="form-label">Nama</label>

                <input type="text"
                    name="name"
                    class="form-control"
                    value="<?= old('name', $user['name']) ?>"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">Email</label>

                <input type="email"
                    name="email"
                    class="form-control"
                    value="<?= old('email', $user['email']) ?>"
                    required>

            </div>

            <div class="mb-3">

                <label class="form-label">Phone</label>

                <input type="text"
                    name="phone"
                    class="form-control"
                    value="<?= old('phone', $user['phone']) ?>">

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Password Baru
                </label>

                <input type="password"
                    name="password"
                    class="form-control">

                <small class="text-muted">
                    Kosongkan jika tidak ingin mengubah password
                </small>

            </div>

            <div class="mb-3">

                <label class="form-label">Role</label>

                <select name="role" class="form-select">

                    <option value="customer"
                        <?= $user['role'] == 'customer' ? 'selected' : '' ?>>
                        Customer
                    </option>

                    <option value="admin"
                        <?= $user['role'] == 'admin' ? 'selected' : '' ?>>
                        Admin
                    </option>

                    <option value="superadmin"
                        <?= $user['role'] == 'superadmin' ? 'selected' : '' ?>>
                        Super Admin
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">Status</label>

                <select name="status" class="form-select">

                    <option value="1"
                        <?= $user['status'] == 1 ? 'selected' : '' ?>>
                        Aktif
                    </option>

                    <option value="0"
                        <?= $user['status'] == 0 ? 'selected' : '' ?>>
                        Non Aktif
                    </option>

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">Provider</label>

                <input type="text"
                    class="form-control"
                    value="<?= $user['provider'] ?>"
                    readonly>

            </div>

            <div class="mb-3">

                <label class="form-label">Created At</label>

                <input type="text"
                    class="form-control"
                    value="<?= $user['created_at'] ?>"
                    readonly>

            </div>

        </div>

        <div class="card-footer">

            <button type="submit"
                class="btn btn-success">

                Update

            </button>

            <a href="<?= base_url('admin/users') ?>"
                class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </form>

</div>
<?= $this->endSection() ?>