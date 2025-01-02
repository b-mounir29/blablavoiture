<div class="row mb-4">
    <div class="col">
        <div class="card">
            <div class="card-header text-center">
                <h3>Modifier un Item</h3>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <form action="<?= base_url('/admin/item/updateitem'); ?>" method="POST">
            <div class="card">
                <div class="card-header">
                    <h5>Remplir les elements suivant</h5>
                </div>
                <div class="card-body">
                    <label class="form-label">Titre</label>
                    <input type="text" class="form-control" value="<?=$item['title']?>" name="title">
                </div>
                <div class="card-body">
                    <label class="form-label">Prix</label>
                    <input type="text" class="form-control"  value="<?=$item['price']?>" name="price">
                </div>

                <div class="card-body">
                    <label class="form-label">Quantity</label>
                    <input type="text" class="form-control" value="<?=$item['quantity']?>"  name="quantity">
                </div>

                <div class="card-footer text-end">
                    <input type="hidden" value="<?=$item['id']?>" name="id">
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </div>
        </form>
    </div>
</div>
