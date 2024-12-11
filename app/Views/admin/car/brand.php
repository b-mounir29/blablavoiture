<div class="row mb-4">
    <div class="col">
        <div class="card">
            <div class="card-header text-center">
                <h3>Gestion des marques</h3>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <form action="<?= base_url('/admin/car/createbrand'); ?>" method="POST">
            <div class="card">
                <div class="card-header">
                    <h5>Ajouter une marque</h5>
                </div>
                <div class="card-body">
                    <label class="form-label">Nom de la  marque</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">
                <h5>Liste des Marques</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm table-hover" id="tableBrand">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marque</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>

                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" id="modalType">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier ma marque</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form method="POST" action="<?= base_url('/admin/car/updatebrand'); ?>" id="formModal">
                <div class="modal-body">
                    <input type="hidden" name="id" value="">
                    <label class="form-label">Nom du model</label>
                    <input type="text" name="name" class="form-control">
                    <label class="form-label">Marque</label>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <input type="submit" class="btn btn-primary" value="Valider">
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var baseUrl = "<?= base_url(); ?>";
        var dataTable = $('#tableBrand').DataTable({
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
                "data": {'model' : 'BrandModel'}
            },
            "columns": [
                {"data": "id"},
                {"data": "Marque"},


                {
                    data: 'id',
                    sortable: false,
                    render: function (data) {
                        return `<a href="${baseUrl}admin/car/brand/${data}"><i class="fa-solid fa-pencil"></i></a>`;
                    }

                },
                {
                    data: 'id',
                    sortable: false,
                    render: function (data) {
                        return `<a href="${baseUrl}admin/car/deletebrand/${data}"><i class="fa-solid fa-pencil"></i></a>`;
                    }

                }



            ]
        });
    });

</script>