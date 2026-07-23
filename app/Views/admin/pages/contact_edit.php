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
                <h3 class="mb-0">Contact</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Contact</li>
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
                  <form action="<?= base_url('contact/update/'.$contact['id']) ?>"
                    method="post"
                    enctype="multipart/form-data">

                  <div class="row g-3">

                      <div class="col-md-6">
                          <label class="form-label">Email</label>
                          <input
                              type="text"
                              class="form-control"
                              name="email"
                              value="<?= esc($contact['email']) ?>"
                              required>
                      </div>
                      <div class="col-md-6">
                          <label class="form-label">Address</label>
                          <textarea class="form-control"  name="alamat" required><?= esc($contact['alamat']) ?></textarea>
                      </div>
                        <div class="col-md-6">
                          <label for="vt-first" class="form-label">Phone Number</label>
                          <input
                            type="text"
                            class="form-control"
                            id="vt-first"
                            value="<?= esc($contact['no_tlp']) ?>"
                            name="no_tlp"
                            required
                          />
                        </div>
                        <div class="col-md-6">
                          <label for="vt-first" class="form-label">Latitude</label>
                          <input
                            type="text"
                            class="form-control"
                            id="vt-first"
                            value="<?= esc($contact['lat']) ?>"
                            name="lat"
                            required
                          />
                        </div>
                         <div class="col-md-6">
                          <label for="vt-first" class="form-label">Longitude</label>
                          <input
                            type="text"
                            class="form-control"
                            id="vt-first"
                            value="<?= esc($contact['long']) ?>"
                            name="long"
                            required
                          />
                        </div>


                      <div class="col-12">
                          <button class="btn btn-warning">
                              Update
                          </button>

                          <a href="<?= base_url('admin/contact') ?>"
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