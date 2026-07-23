<?= $this->extend('admin/layouts/template') ?>

<?= $this->section('content') ?>

<main class="app-main">

    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">ADD PRODUCT</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">

        <div class="container-fluid">

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif ?>

            <div class="card card-success card-outline">

                <div class="card-header">
                    <h3 class="card-title">Input Product</h3>
                </div>

                <form action="<?= base_url('product/save') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="card-body">
                        <div class="row">
                            <!-- Category -->
                            <div class="col-md-6 mb-3">
                                <label>Category</label>
                                <select name="category_id" class="form-control" required>
                                    <option value="">-- Select Category --</option>
                                    <?php foreach($categories as $category): ?>
                                        <option value="<?= $category['id'] ?>">
                                            <?= $category['name'] ?>
                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <!-- SKU -->
                            <div class="col-md-6 mb-3">
                                <label>SKU</label>
                                <input type="text" name="sku" class="form-control">
                            </div>
                            <!-- Product Name -->
                            <div class="col-md-6 mb-3">
                                <label>Product Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <!-- Slug -->
                            <div class="col-md-6 mb-3">
                                <label>Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control" readonly>
                            </div>
                            <!-- Price -->
                            <div class="col-md-4 mb-3">
                                <label>Price</label>
                                <input type="number" name="price" class="form-control" required>
                            </div>
                            <!-- Discount -->
                            <div class="col-md-4 mb-3">
                                <label>Discount (%)</label>
                                <input type="number" name="discount" class="form-control" value="0">
                            </div>
                            <!-- Stock -->
                            <div class="col-md-4 mb-3">
                                <label>Stock</label>
                                <input type="number" name="stock"  class="form-control"  value="0">
                            </div>
                            <!-- Weight -->
                            <div class="col-md-6 mb-3">
                                <label>Weight (Gram)</label>
                                <input type="number" name="weight" class="form-control">
                            </div>
                            <!-- Status -->
                            <div class="col-md-6 mb-3">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="publish">Publish</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                            <!-- Image -->
                            <div class="col-md-12 mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                                <img id="preview" style="max-width:200px;margin-top:10px;display:none;">
                            </div>
                            <!-- Description -->
                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea name="description" rows="8" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Save Product</button>
                        <a href="<?= base_url('admin/product') ?>" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>