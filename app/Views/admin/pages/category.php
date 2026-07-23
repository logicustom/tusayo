<?= $this->extend('admin/layouts/template') ?>

<?= $this->section('content') ?>

<div class="card">

    <div class="card-header">

        <a href="<?= base_url('admin/category/add') ?>"
           class="btn btn-success">

            Add Category

        </a>

    </div>

    <div class="card-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style='text-align:center;'>No</th>
                    <th style='text-align:center;'>Image</th>
                    <th style='text-align:center;'>Name</th>
                    <th style='text-align:center;'>Slug</th>
                    <th style='text-align:center;'>Status</th>
                    <th style='text-align:center;' width="180">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach($categories as $row): ?>
                <tr>
                    <td style='text-align:center;'><?= $no ?></td>
                    <td style='text-align:center;'>
                        <?php if($row['image']) : ?>
                            <img src="<?= base_url('public/assets/img/categories/'.$row['image']) ?>" width="60">
                        <?php endif ?>

                    </td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['slug'] ?></td>
                    <td style='text-align:center;'>
                        <?php if($row['status']) : ?>
                            <span class="badge bg-success">Active</span>
                        <?php else : ?>
                            <span class="badge bg-danger">Non Active</span>
                        <?php endif ?>
                    </td>
                    <td style='text-align:center;'>
                        <a href="<?= base_url('admin/category/edit/'.$row['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <?php if($row['status'] == 1): ?>
                            <a href="<?= base_url('admin/category/deactivate/'.$row['id']) ?>"
                            class="btn btn-danger btn-sm">
                                Nonaktifkan
                            </a>
                        <?php else: ?>
                            <a href="<?= base_url('admin/category/activate/'.$row['id']) ?>"
                            class="btn btn-success btn-sm">
                                Aktifkan
                            </a>

                        <?php endif ?>
                    </td>
                </tr>
                <?php 
                $no++;
                endforeach 
                ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>