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
</style>
  <!--begin::App Main-->
  <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/tabulator-tables@6.4.0/dist/css/tabulator.min.css">
      <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Products</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">products</a></li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="app-content">
          <div class="container-fluid">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 16rem">
                    <span class="input-group-text">
                      <i class="bi bi-search" aria-hidden="true"></i>
                    </span>
                    <input
                      id="table-filter"
                      type="search"
                      class="form-control"
                      placeholder="Filter rows…"
                      aria-label="Filter rows"
                    />
                  </div>
                </div>
              </div>
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

                      <a href="<?= base_url('admin/product/add') ?>" >
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                          <i class="bi bi-plus me-1" aria-hidden="true"></i>
                          ADD
                        </button>
                      </a>
                  </div>
                </div>
                <div id="product-table"></div>
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
const data = <?= json_encode($product, JSON_UNESCAPED_UNICODE) ?>;
</script>

<script>
document
    .getElementById("export-excel")
    .addEventListener("click", function () {

        table.download(
            "xlsx",
            "product.xlsx",
            {
                sheetName: "product"
            }
        );

    });

document
    .getElementById("print-table")
    .addEventListener("click", function () {

        table.print(false, true);

    });
const table = new Tabulator("#product-table", {
    data: data,
    layout: "fitColumns",
    pagination: true,
    paginationSize: 10,
    columns: [
        {
            title: "ID",
            field: "id",
            width: 70
        },
        {
            title: "Image",
            field: "image",
            width: 100,
            hozAlign: "center",
            formatter: function(cell){

                let image = cell.getValue();

                return `
                    <img src="<?= base_url('public/assets/img/product') ?>/${image}"
                         width="50"
                         height="50"
                         style="object-fit:cover;border-radius:5px">
                `;
            }
        },
        {
            title: "Name",
            field: "name"
        },
        {
            title: "SKU",
            field: "sku",
            hozAlign: "center",
        },
        {
            title: "Weigth(gr)",
            field: "weight",
            hozAlign: "center",
        },
        {
            title: "Stock",
            field: "stock",
            hozAlign: "center",
        },
        {
            title: "Description",
            field: "description"
        },
        {
            title: "Status",
            field: "status",
            hozAlign: "center",
            formatter: function(cell){

                let status = cell.getValue();

                if(status === "Aktif"){
                    return '<span class="badge bg-success">Aktif</span>';
                }

                return '<span class="badge bg-danger">Tidak Aktif</span>';
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

                      <a href="<?= base_url('admin/product/edit') ?>/${row.id}" >
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                          <i class="nav-icon bi bi-pencil"></i>
                          Edit
                        </button>
                      </a>


                    <!--<a href="<?= base_url('product/delete') ?>/${row.id}"
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
      
  <!--end::App Main-->
<?= $this->endSection() ?>