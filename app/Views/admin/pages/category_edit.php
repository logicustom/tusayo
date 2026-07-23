<?= $this->extend('admin/layouts/template') ?>

<?= $this->section('content') ?>

<div class="card">

    <div class="card-header">
        Edit Category
    </div>

    <div class="card-body">

        <form
            action="<?= base_url('category/update/'.$category['id']) ?>"
            method="post"
            enctype="multipart/form-data">

            <?= csrf_field() ?>

            <div class="mb-3">

                <label>Parent Category</label>

                <select
                    name="parent_id"
                    class="form-control">

                    <option value="">
                        Main Category
                    </option>

                    <?php foreach($parents as $parent): ?>

                        <option
                            value="<?= $parent['id'] ?>"
                            <?= ($category['parent_id'] == $parent['id']) ? 'selected' : '' ?>>

                            <?= $parent['name'] ?>

                        </option>

                    <?php endforeach ?>

                </select>

            </div>

            <div class="mb-3">

                <label>Category Name</label>

                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    value="<?= $category['name'] ?>"
                    required>

            </div>

            <div class="mb-3">

                <label>Slug</label>

                <input
                    type="text"
                    name="slug"
                    id="slug"
                    class="form-control"
                    value="<?= $category['slug'] ?>"
                    readonly>

            </div>

            <div class="mb-3">

                <label>Current Image</label>

                <br>

                <?php if(!empty($category['image'])): ?>

                    <img
                        src="<?= base_url('public/assets/img/categories/'.$category['image']) ?>"
                        width="120"
                        class="img-thumbnail">

                <?php endif ?>

            </div>

            <div class="mb-3">

                <label>Change Image</label>

                <input
                    type="file"
                    name="image"
                    class="form-control">

            </div>

            <div class="mb-3">

                <label>Status</label>

                <select
                    name="status"
                    class="form-control">

                    <option
                        value="1"
                        <?= ($category['status'] == 1) ? 'selected' : '' ?>>

                        Active

                    </option>

                    <option
                        value="0"
                        <?= ($category['status'] == 0) ? 'selected' : '' ?>>

                        Non Active

                    </option>

                </select>

            </div>

            <button
                type="submit"
                class="btn btn-success">

                Update

            </button>

            <a
                href="<?= base_url('admin/category') ?>"
                class="btn btn-secondary">

                Back

            </a>

        </form>

    </div>

</div>

<script>
$(document).on('keyup','#name',function(){

    let slug = $(this)
        .val()
        .toLowerCase()
        .replace(/[^a-z0-9]+/g,'-')
        .replace(/(^-|-$)/g,'');

    $('#slug').val(slug);

});
</script>

<?= $this->endSection() ?>