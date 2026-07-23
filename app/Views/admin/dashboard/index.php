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
                <h3 class="mb-0">Dashboard v2</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard v2</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon text-bg-primary shadow-sm">
                    <i class="bi bi-gear-fill"></i>
                  </span>

                  <div class="info-box-content">
                    <span class="info-box-text">CPU Traffic</span>
                    <span class="info-box-number">
                      10
                      <small>%</small>
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon text-bg-danger shadow-sm">
                    <i class="bi bi-hand-thumbs-up-fill"></i>
                  </span>

                  <div class="info-box-content">
                    <span class="info-box-text">Likes</span>
                    <span class="info-box-number">41,410</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

              <!-- fix for small devices only -->
              <!-- <div class="clearfix hidden-md-up"></div> -->

              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon text-bg-success shadow-sm">
                    <i class="bi bi-cart-fill"></i>
                  </span>

                  <div class="info-box-content">
                    <span class="info-box-text">Sales</span>
                    <span class="info-box-number">760</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                  <span class="info-box-icon text-bg-warning shadow-sm">
                    <i class="bi bi-people-fill"></i>
                  </span>

                  <div class="info-box-content">
                    <span class="info-box-text">New Members</span>
                    <span class="info-box-number">2,000</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!--begin::Row-->
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header">
                    <h5 class="card-title">Monthly Recap Report</h5>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
                        <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
                        <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
                      </button>

                      <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
                        <i class="bi bi-x-lg"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!--begin::Row-->
                    <div class="row">
                      <div class="col-md-8">
                        <p class="text-center">
                          <strong>Sales: 1 Jan, 2023 - 30 Jul, 2023</strong>
                        </p>

                        <div id="sales-chart"></div>
                      </div>
                      <!-- /.col -->
                      <div class="col-md-4">
                        <p class="text-center">
                          <strong>Goal Completion</strong>
                        </p>

                        <div class="table-responsive">
                          <table class="table m-0">
                            <thead>
                              <tr>
                                <th>Order ID</th>
                                <th>Item</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <a
                                    href="pages/examples/invoice.html"
                                    class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                                    >OR9842</a
                                  >
                                </td>
                                <td>Call of Duty IV</td>
                              </tr>
                              <tr>
                                <td>
                                  <a
                                    href="pages/examples/invoice.html"
                                    class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                                    >OR7429</a
                                  >
                                </td>
                                <td>iPhone 6 Plus</td>
                              </tr>
                              <tr>
                                <td>
                                  <a
                                    href="pages/examples/invoice.html"
                                    class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                                    >OR9842</a
                                  >
                                </td>
                                <td>Call of Duty IV</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.table-responsive -->
    
                      </div>
                      <!-- /.col -->
                    </div>
                    <!--end::Row-->
                  </div>
                  <!-- ./card-body -->

                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->

          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
    <script
      src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
      integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
      crossorigin="anonymous"
    ></script>

<script>

const sales_chart_options = {

    series: [
        {
            name: 'Message',
            data: <?= json_encode($chartTotal) ?>
        }
    ],

    chart: {
        height: 180,
        type: 'area',
        toolbar: {
            show: false
        }
    },

    legend: {
        show: true
    },

    colors: ['#0d6efd'],

    dataLabels: {
        enabled: false
    },

    stroke: {
        curve: 'smooth'
    },

    xaxis: {
        type: 'datetime',
        categories: <?= json_encode($chartDate) ?>
    }
    ,
    tooltip: {
      x: {
        format: 'MMMM yyyy',
      },
    }
};

const sales_chart = new ApexCharts(
    document.querySelector('#sales-chart'),
    sales_chart_options
);

sales_chart.render();

</script>
<?= $this->endSection() ?>