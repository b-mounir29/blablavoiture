<div class="row mb-4">
    <div class="col">
        <div class="card">
            <div class="card-header text-center">
                <h3>Ajouter une voiture</h3>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <form action="<?= base_url('/admin/car/createcar'); ?>" method="POST">
            <div class="card">
                <div class="card-header">
                    <h5>Veuillez remplir les champs suivant : </h5>
                </div>

                <div class="card-body">
                    <label class="form-label">Utilisateur</label>
                    <select class="form-select" name="id_user">
                        <option value="none" selected>Aucun</option>
                        <?php foreach ($users as $user) { ?>
                            <option value="<?= $user['id']; ?>">
                                <?=$user['username']; ?>
                            </option>
                        <?php } ?>
                    </select>

                    <label class="form-label">Nom du model</label>
                    <select class="form-select" name="id_modelcar">
                        <option value="none" selected>Aucun</option>
                        <?php foreach ($models as $model) { ?>
                            <option value="<?= $model['id']; ?>">
                                <?=$model['name']; ?>
                            </option>
                        <?php } ?>
                    </select>


                    <label class="form-label">Couleur</label>
                    <select class="form-select" name="id_color">
                        <option value="none" selected>Aucun</option>
                        <?php foreach ($colors as $color) { ?>
                            <option value="<?= $color['id']; ?>">
                                <?=$color['name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </div>
        </form>
                </div>
