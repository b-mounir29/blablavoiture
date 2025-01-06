<div class="row mb-4">
    <div class="col">
        <div class="card">
            <div class="card-header text-center">
                <h3>Modifier la marque</h3>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <form action="<?= base_url('/admin/car/updatebrand'); ?>" method="POST">
            <div class="card">
                <div class="card-header">
                    <h5>Modifier une marque</h5>
                </div>
                <div class="card-body">
                    <label class="form-label">Veuillez écrire le nom de la marque</label>
                    <input type="text" class="form-control"  value="<?=$brand['name']?>" name="name">
                    <input type="hidden" class="form-control" value="<?=$brand['id']?>" name="id">
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>

            </div>
        </form>
    </div>
</div>
