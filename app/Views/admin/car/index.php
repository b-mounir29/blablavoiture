<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Liste des Voitures</h4>
        <a href="<?= base_url('/admin/car/new'); ?>"><i class="fa-solid fa-user-plus"></i></a>
    </div>
    <div class="card-body">
        <table id="tableUsers" class="table table-hover">
            <thead>
            <tr>
                <th>Id voiture</th>
                <th>User</th>
                <th>Model</th>
                <th>Color</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Deleted_at</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
