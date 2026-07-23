      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image
            <img
              src="./assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />-->
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Welcome, </span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="navigation"
              aria-label="Main navigation"
              data-accordion="false"
              id="navigation"
            >
            <!--
              <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>
                    Dashboard
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./index.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Dashboard v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index2.html" class="nav-link active">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Dashboard v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Dashboard v3</p>
                    </a>
                  </li>
                </ul>
              </li>-->

              <li class="nav-item">
                <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
                  <i class="nav-icon bi bi-speedometer"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/category') ?>" class="nav-link">
                  <i class="nav-icon bi bi-palette"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/product') ?>" class="nav-link">
                  <i class="nav-icon bi bi-file-earmark-text"></i>
                  <p>Product</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('admin/blog') ?>" class="nav-link">
                  <i class="nav-icon bi bi-table"></i>
                  <p>Blog</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?= base_url('admin/order') ?>" class="nav-link">
                  <i class="nav-icon bi bi-list"></i>
                  <p>Order</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-gear"></i>
                  <p>
                    Settings
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('admin/users') ?>" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Users</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('admin/contact') ?>" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Contact</p>
                    </a>
                  </li>
                </ul>  
              </li>

            </ul>
            <!--end::Sidebar Menu-->

            <!-- Docs CTA (bottom of sidebar) -->
            <div class="p-3 mt-3 border-top border-secondary border-opacity-25">
              <a
                href="http://localhost/tokoonline/"
                class="btn btn-sm btn-outline-light w-100 d-flex align-items-center justify-content-center gap-2"
                target="_blank"
              >
                <i class="bi bi-globe" aria-hidden="true"></i>
                View Website
              </a>
            </div>
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->