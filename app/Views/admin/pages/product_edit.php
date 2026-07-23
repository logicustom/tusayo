<?= $this->extend('admin/layouts/template') ?>

<?= $this->section('content') ?>
<!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">productS</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">products</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <div class="app-content">
          <!--begin::Container-->
<?php if(session()->getFlashdata('error')) : ?>
<div class="alert alert-danger">
    <?= session()->getFlashdata('error') ?>
</div>
<?php endif; ?>



              <div class="col-lg-12">
                <div class="card card-success card-outline mb-4">
                  <div class="card-header">
                    <div class="card-title">Edit Data</div>
                  </div>
                  <div class="card-body">
                  <form action="<?= base_url('product/update/'.$product['id']) ?>"
                    method="post"
                    enctype="multipart/form-data">

                  <div class="row g-3">
                            <!-- Category -->
                      <div class="col-md-6 mb-3">
                            <label>Category</label>
                            <select name="category_id" class="form-control" required>
                              <option value="">-- Select Category --</option>
                              <?php foreach($categories as $category): ?>
                                <?php if($category['id']==esc($product['category_id'])){?>
                                <option value="<?= $category['id'] ?>" selected>
                                  <?= $category['name'] ?>
                                </option>
                                  <?php }else{?>

                             <option value="<?= $category['id'] ?>">
                                  <?= $category['name'] ?>
                                </option>
                                  <?php }?> 
                                <?php endforeach ?>
                                
                            </select>
                        </div>
                      <!-- SKU -->
                      <div class="col-md-6 mb-3">
                          <label>SKU</label>
                          <input type="text" name="sku" class="form-control" value="<?= esc($product['sku']) ?>">
                       </div>

                      <div class="col-md-6">
                          <label class="form-label">Name</label>
                          <input
                              type="text"
                              class="form-control"
                              name="name"
                              value="<?= esc($product['name']) ?>"
                              required>
                      </div>

                      <div class="col-md-6">
                          <label class="form-label">Description</label>
                          <textarea class="form-control"  name="description" required><?= esc($product['description']) ?></textarea>
                      </div>
                            <!-- Price -->
                            <div class="col-md-6">
                                <label>Price</label>
                                <input type="number" name="price" class="form-control" value="<?= esc($product['price']) ?>" required>
                            </div>
                            <!-- Discount -->
                            <div class="col-md-6">
                                <label>Discount (%)</label>
                                <input type="number" name="discount" class="form-control" value="<?= esc($product['discount']) ?>">
                            </div>
                            <!-- Stock -->
                            <div class="col-md-6">
                                <label>Stock</label>
                                <input type="number" name="stock"  class="form-control"  value="<?= esc($product['stock']) ?>">
                            </div>
                            <!-- Weight -->
                            <div class="col-md-6 mb-3">
                                <label>Weight (Gram)</label>
                                <input type="number" name="weight" class="form-control" value="<?= esc($product['weight']) ?>">
                            </div>
                      <div class="col-md-6">

                          <label class="form-label">Image</label>

                          <?php if(!empty($product['image'])) : ?>
                              <div class="mb-2">
                                  <img
                                      src="<?= base_url('public/assets/img/product/'.$product['image']) ?>"
                                      width="120"
                                      class="img-thumbnail">
                              </div>
                          <?php endif; ?>

                          <input
                              type="file"
                              class="form-control"
                              name="image">

                          <small class="text-muted">
                              Kosongkan jika tidak ingin mengganti gambar
                          </small>

                      </div>

                  <div class="col-md-6">
                        <label class="form-label">Status</label>

                        <select
                            name="status"
                            class="form-select"
                            required>

                            <option value="">Pilih Status</option>

                            <option value="Aktif"
                                <?= $product['status'] == 'Aktif' ? 'selected' : '' ?>>
                                Aktif
                            </option>

                            <option value="Tidak Aktif"
                                <?= $product['status'] == 'Tidak Aktif' ? 'selected' : '' ?>>
                                Tidak Aktif
                            </option>

                        </select>
                    </div>

                      <div class="col-12">
                          <button class="btn btn-warning">
                              Update
                          </button>

                          <a href="<?= base_url('admin/product') ?>"
                            class="btn btn-secondary">
                              Back
                          </a>
                      </div>

                  </div>

              </form>
                  </div>
                </div>
              </div>
   
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->

<?= $this->endSection() ?>