<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Liste des Voitures</h4>
        <a href="<?= base_url('/admin/car/car'); ?>"><i class="fa-solid fa-user-plus"></i></a>
    </div>
    </div>
    <div class="card-body">
        <table class="table table-sm table-hover" id="tableCar">
            <thead>
            <tr>
                <th>Id </th>
                <th>User</th>
                <th>Color</th>
                <th>Model</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Deleted_at</th>
                <th>Modifer</th>
                <th>Supprimer</th>
            </tr>
            </thead>

        </table>
    </div>
</div>
<script>
    $(document).ready(function () {
        var baseUrl = "<?= base_url(); ?>";
        var dataTable = $('#tableCar').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "pageLength": 10,
            "language": {
                url: baseUrl + 'js/datatable/datatable-2.1.4-fr-FR.json',
            },
            "ajax": {
                "url": baseUrl + "admin/car/searchdatatable",
                "type": "POST",
                "data": {'model' : 'CarModel'}
            },
            "columns": [
                {"data": "id"},
                {"data":"username"},
                {"data":"colorname"},
                {"data":"modelcarname"},
                {"data":"created_at"},
                {"data":"updated_at"},
                {"data":"deleted_at"},

                {
                    data: 'id',
                    sortable: false,
                    render: function (data) {
                        return `<a href="${baseUrl}admin/car/${data}"><i class="fa-solid fa-pencil"></i></a>`;
                    }

                },
                {
                    data: 'id',
                    sortable: false,
                    render: function (data) {
                        return `<a href="${baseUrl}admin/car/deletecar/${data}"><i class="fa-solid fa-pencil"></i></a>`;
                    }
                }





            ]
        });
    });


</script>
