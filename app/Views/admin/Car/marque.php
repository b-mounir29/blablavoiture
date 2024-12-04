<div class="row mb-4">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3>Marques d'objet</h3>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <form action="<?= base_url('/admin/item/createbrand'); ?>" method="POST">
            <div class="card">
                <div class="card-header">
                    <h5>Ajouter une marque</h5>
                </div>
                <div class="card-body">
                    <label class="form-label">Nom de la marque</label>
                    <input type="text" class="form-control" name="name">
                    <label class="form-label">Marque parente</label>
                    <select class="form-select" name="id_brand_parent">
                        <option value="none" selected>Aucun</option>