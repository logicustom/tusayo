<?= $this->extend('admin/layouts/template') ?>

<?= $this->section('content') ?>

<div class="card">

    <div class="card-header">
        Add Category
    </div>

    <div class="card-body">

        <form
            action="<?= base_url('category/save') ?>"
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
                        value="<?= $parent['id'] ?>">

                        <?= $parent['name'] ?>

                    </option>

                    <?php endforeach ?>

                </select>

            </div>

            <div class="mb-3">

                <label>Name</label>

                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    required>

            </div>

            <div class="mb-3">

                <label>Slug</label>

                <input
                    type="text"
                    name="slug"
                    id="slug"
                    class="form-control"
                    readonly>

            </div>

            <div class="mb-3">

                <label>Image</label>

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

                    <option value="1">
                        Active
                    </option>

                    <option value="0">
                        Non Active
                    </option>

                </select>

            </div>

            <button
                class="btn btn-success">

                Save

            </button>

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