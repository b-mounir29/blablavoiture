<div class="row mb-4">
    <div class="col">
        <div class="card">
            <div class="card-header text-center">
                <h3>Modifier la couleur</h3>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <form action="<?= base_url('/admin/car/updatemodel'); ?>" method="POST">
            <div class="card">
                <div class="card-header">
                    <h5>Choisir un model</h5>
                </div>
                <div class="card-body">
                    <label class="form-label">Modifier le model</label>
                    <input type="text" class="form-control" value="<?=$color['name']?>" name="name">
                    <input type="hidden" class="form-control" value="<?=$color['id']?>" name="id">
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>

            </div>
        </form>
    </div>
</div>