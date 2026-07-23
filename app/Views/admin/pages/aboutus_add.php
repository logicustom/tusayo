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
                <h3 class="mb-0">About Us</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">About Us</li>
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
                    <div class="card-title">Input Data</div>
                  </div>
                  <div class="card-body">
                  <form action="<?= base_url('aboutus/save') ?>"
                        method="post"
                        enctype="multipart/form-data">
                      <div class="row g-3">
                        <div class="col-md-6">
                          <label for="vt-first" class="form-label">Title</label>
                          <input
                            type="text"
                            class="form-control"
                            id="vt-first"
                            value=""
                            name="title"
                            required
                          />
                        </div>
                        <div class="col-md-6">
                          <label for="vt-first" class="form-label">Subtitle</label>
                          <input
                            type="text"
                            class="form-control"
                            id="vt-first"
                            value=""
                            name="subtitle"
                            required
                          />
                        </div>
                        <div class="col-md-6">
                          <label for="vt-username" class="form-label">Description</label>
                          <textarea class="form-control" id="vt-username" name="description" required></textarea>
                        </div>
                        <div class="col-md-6">
                          <label for="vt-first" class="form-label">Vision</label>
                          <input
                            type="text"
                            class="form-control"
                            id="vt-first"
                            value=""
                            name="vision"
                            required
                          />
                        </div>
                        <div class="col-md-6">
                          <label for="vt-username" class="form-label">Mission</label>
                          <textarea class="form-control" id="vt-username" name="mission" required></textarea>
                        </div>
                        <div class="col-12">
                          <button class="btn btn-success" type="submit">Save</button>

                          <a href="<?= base_url('admin/aboutus') ?>"
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