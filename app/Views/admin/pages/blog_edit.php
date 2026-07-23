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
                <h3 class="mb-0">Blog</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Blog</li>
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
                  <form action="<?= base_url('blog/update/'.$blog['id']) ?>"
                    method="post"
                    enctype="multipart/form-data">

                  <div class="row g-3">

                      <div class="col-md-6">
                          <label class="form-label">Title</label>
                          <input
                              type="text"
                              class="form-control"
                              name="name"
                              value="<?= esc($blog['title']) ?>"
                              required>
                      </div>

                      <div class="col-md-6">
                          <label class="form-label">Description</label>
                          <textarea class="form-control"  name="description" required><?= esc($blog['description']) ?></textarea>
                      </div>

                      <div class="col-md-6">

                          <label class="form-label">Image</label>

                          <?php if(!empty($blog['image'])) : ?>
                              <div class="mb-2">
                                  <img
                                      src="<?= base_url('public/assets/img/blog/'.$blog['image']) ?>"
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
                                <?= $blog['status'] == 'Aktif' ? 'selected' : '' ?>>
                                Aktif
                            </option>

                            <option value="Tidak Aktif"
                                <?= $blog['status'] == 'Tidak Aktif' ? 'selected' : '' ?>>
                                Tidak Aktif
                            </option>

                        </select>
                    </div>

                      <div class="col-12">
                          <button class="btn btn-warning">
                              Update
                          </button>

                          <a href="<?= base_url('admin/blog') ?>"
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