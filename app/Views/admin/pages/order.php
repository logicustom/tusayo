<?= $this->extend('admin/layouts/template') ?>

<?= $this->section('content') ?>
<style>
.tabulator {
    border: 1px solid #dee2e6;
    border-radius: .2rem;
}

.tabulator-header {
    background: #f8f9fa;
}

.tabulator-row {
    min-height: 50px;
}

.tabulator .tabulator-header .tabulator-col{
    text-align: center !important;
}
</style>
  <!--begin::App Main-->
  <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/tabulator-tables@6.4.0/dist/css/tabulator.min.css">
      <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Orders</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">orders</a></li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="app-content">
          <div class="container-fluid">
            <div class="card">

              <div class="card-body">
                <div class="d-flex gap-2 mb-3">
                  <div class="mb-3">
                      <button id="export-excel" type="button" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-filetype-csv me-1" aria-hidden="true"></i>
                        Export
                      </button>

                      <button id="print-table" type="button" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-printer me-1" aria-hidden="true"></i>
                        Print
                      </button>
                  </div>
                </div>
                <div class="row mb-3">

                    <div class="col-md-3">
                        <input type="date"
                            id="start_date"
                            class="form-control"  value="<?= date('Y-m-d') ?>">
                    </div>

                    <div class="col-md-3">
                        <input type="date"
                            id="end_date"
                            class="form-control"  value="<?= date('Y-m-d') ?>">
                    </div>

                    <div class="col-md-4">
                        <input type="text"
                            id="search"
                            class="form-control"
                            placeholder="Cari Invoice / Customer">
                    </div>

                    <div class="col-md-2">

                        <button id="btnFilter"
                                class="btn btn-primary">
                            Filter
                        </button>

                        <button id="btnReset"
                                class="btn btn-secondary">
                            Reset
                        </button>

                    </div>

                </div>

                <div id="order-table"></div>
              </div>
              <div class="card-footer text-secondary small">
                Powered by
                <a href="https://tabulator.info/" target="_blank" rel="noopener">Tabulator</a>
                &mdash; vanilla JS, no jQuery required.
              </div>
            </div>
          </div>
        </div>
      </main>

<script src="https://cdn.jsdelivr.net/npm/tabulator-tables@6.4.0/dist/js/tabulator.min.js"></script>
<script src="https://oss.sheetjs.com/sheetjs/xlsx.full.min.js"></script>


<script>
document
    .getElementById("export-excel")
    .addEventListener("click", function () {

        table.download(
            "xlsx",
            "order.xlsx",
            {
                sheetName: "order"
            }
        );

    });

document
    .getElementById("print-table")
    .addEventListener("click", function () {
        table.print(false, true);
    });

document
.getElementById('btnFilter')
.addEventListener('click', function(){

    table.setData(
        "<?= base_url('admin/order/getData') ?>",
        {
            search: document.getElementById('search').value,
            start_date: document.getElementById('start_date').value,
            end_date: document.getElementById('end_date').value
        }
    );

});

document.getElementById('btnReset').addEventListener('click', function () {

    const today = new Date().toISOString().split('T')[0];

    document.getElementById('search').value = '';
    document.getElementById('start_date').value = today;
    document.getElementById('end_date').value = today;

    table.setData("<?= base_url('admin/order/getData') ?>", {
        start_date: today,
        end_date: today
    });
});

document.getElementById('search').addEventListener('keyup', function () {

    table.setData(
        "<?= base_url('admin/order/getData') ?>",
        {
            search: document.getElementById('search').value,
            start_date: document.getElementById('start_date').value,
            end_date: document.getElementById('end_date').value
        }
    );

});

const table = new Tabulator("#order-table", {
    ajaxURL         : "<?= base_url('admin/order/getData') ?>",
    layout          : "fitColumns",
    pagination      : true,
    paginationSize  : 10,
    columns: [

            {
            title: "No",
            width: 70,
            hozAlign: "center",
            formatter: function(cell) {

                let row = cell.getRow();
                let table = cell.getTable();

                let page = table.getPage();
                let size = table.getPageSize();

                return ((page - 1) * size) + row.getPosition(true);
            }
        },
        {
            title: "Invoice",
            field: "invoice",
            width: 110
        },
        {
            title: "Customer",
            field: "customer",
            headerHozAlign: "center"
        },
        {
            title: "Email",
            field: "email",
            headerHozAlign: "center"
        },
        {
            title: "Payment Status",
            field: "payment_status",
            hozAlign: "center",
            formatter: function(cell){

                let payment_status = cell.getValue();

                if(payment_status ==="paid"){
                    return '<span class="badge bg-success">Paid</span>';
                }else if(payment_status === "pending"){
                    return '<span class="badge bg-warning">Pending</span>';
                }else if(payment_status === "expired"){
                    return '<span class="badge bg-danger">Expired</span>';
                }else if(payment_status === "refund"){
                    return '<span class="badge bg-info">Refund</span>';
                }

                return '<span class="badge bg-danger">Failed</span>';
            }
        },
        {
            title: "Action",
            field: "id",
            width: 180,
            hozAlign: "center",
            formatter: function(cell){

                let row = cell.getRow().getData();

                return `

                      <a href="<?= base_url('admin/order/detail') ?>/${row.id}" >
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                          <i class="nav-icon bi bi-pencil"></i>
                          Edit
                        </button>
                      </a>


                    <!--<a href="<?= base_url('order/delete') ?>/${row.id}"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Hapus data ini?')">
                        Hapus
                    </a>-->
                `;
            }
        }
    ]
});
</script>


<?= $this->endSection() ?>