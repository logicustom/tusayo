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
  <link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/tabulator-tables@6.4.0/dist/css/tabulator.min.css">

<div class="card">
    <div class="card-body">
        <div class="d-flex gap-2 mb-3">

            <div class="mb-3">
                <a href="<?= base_url('admin/users/add') ?>">
                <button id="export-excel" type="button" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-plus me-1" aria-hidden="true"></i>ADD
                </button>
                </a>
            </div>
        </div>

        <div id="users-table"></div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/tabulator-tables@6.4.0/dist/js/tabulator.min.js"></script>
<script src="https://oss.sheetjs.com/sheetjs/xlsx.full.min.js"></script>

<script>
const statusBadge = function(cell){

    let status = cell.getValue();

    if(status == 1){
        return '<span class="badge bg-success">Aktif</span>';
    }

    return '<span class="badge bg-danger">Non Aktif</span>';
};

const roleBadge = function(cell){

    let role = cell.getValue();

    if(role == 'superadmin'){
        return '<span class="badge bg-danger">Super Admin</span>';
    }

    if(role == 'admin'){
        return '<span class="badge bg-primary">Admin</span>';
    }

    return '<span class="badge bg-secondary">Customer</span>';
};

new Tabulator("#users-table", {

    ajaxURL:"<?= base_url('admin/users/getData') ?>",

    layout:"fitColumns",

    pagination:true,

    paginationSize:10,

    columns:[

        {
            title:"No",
            formatter:"rownum",
            width:60,
            headerHozAlign:"center",
            hozAlign:"center"
        },

        {
            title:"Nama",
            field:"name",
            headerHozAlign:"center"
        },

        {
            title:"Email",
            field:"email",
            headerHozAlign:"center"
        },

        {
            title:"Phone",
            field:"phone",
            width:120,
            headerHozAlign:"center"
        },

        {
            title:"Provider",
            field:"provider",
            width:120,
            headerHozAlign:"center",
            hozAlign:"center"
        },

        {
            title:"Role",
            field:"role",
            width:110,
            formatter:roleBadge,
            headerHozAlign:"center",
            hozAlign:"center"
        },

        {
            title:"Status",
            field:"status",
            width:90,
            formatter:statusBadge,
            headerHozAlign:"center",
            hozAlign:"center"
        },

        {
            title:"Action",
            field:"id",
            width:90,
            hozAlign:"center",
            headerHozAlign:"center",

            formatter:function(cell){

                let row = cell.getRow().getData();

                return `
                    <a href="<?= base_url('users/edit') ?>/${row.id}"
                       class="btn btn-warning btn-sm">

                        Edit

                    </a>
                `;
            }
        }

    ]

});
</script>    
<?= $this->endSection() ?>