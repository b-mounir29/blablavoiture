<div class="row mb-4">
    <div class="col">
        <div class="card">
            <div class="card-header text-center">
                <h3>Gestion des couleur</h3>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <form action="<?= base_url('/admin/car/createcolor'); ?>" method="POST">
            <div class="card">
                <div class="card-header">
                    <h5>Ajouter une couleur</h5>
                </div>
                <div class="card-body">
                    <label class="form-label">Nom de la  couleur</label>
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
                <h5>Liste des couleurs</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm table-hover" id="tableColor">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Color</th>
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

    <script>
        $(document).ready(function () {
            var baseUrl = "<?= base_url(); ?>";
            var dataTable = $('#tableColor').DataTable({
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
                    "data": {'model' : 'ColorModel'}
                },
                "columns": [
                    {"data": "id"},
                    {"data": "Color"},


                    {
                        data: 'id',
                        sortable: false,
                        render: function (data) {
                            return `<a href="${baseUrl}admin/car/color/${data}"><i class="fa-solid fa-pencil"></i></a>`;
                        }

                    },
                    {
                        data: 'id',
                        sortable: false,
                        render: function (data) {
                            return `<a href="${baseUrl}admin/car/deletecolor/${data}"><i class="fa-solid fa-pencil"></i></a>`;
                        }

                    }



                ]
            });
        });

    </script>
