<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10 col-12">
        <div class="card shadow-lg rounded-3">
            <div class="card-header bg-primary-subtle text-black text-center">
                <h1 class="mb-0">Créer un trajet</h1>
            </div>
            <form action="<?= base_url('travel/create'); ?>" method="POST">
                <div class="card-body">
                    <!-- Nombre de sièges libres -->
                    <div class="mb-4">
                        <label for="nb_seat" class="form-label">Nombre de siège</label>
                        <select id="nb_seat" class="form-select" name="nb_seat" required>
                            <option selected>Nombre de sièges</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>

                    <!-- Nombre de sièges libres -->
                    <div class="mb-4">
                        <label for="city_departure" class="form-label">Ville de départ</label>
                        <select id="city_departure" class="form-control me-2 name_city" name="id_city_departure"></select>
                    </div>



                    <!-- Adresse de départ -->
                    <div class="mb-4">
                        <label for="adress_departure" class="form-label">Adresse de départ</label>
                        <input type="text" class="form-control" id="adress_departure" name="adress_departure" placeholder="Adresse de départ" required>
                    </div>

                    <!-- Date et heure de départ -->
                    <div class="mb-4">
                        <label for="date_departure" class="form-label">Date et heure de départ</label>
                        <input type="datetime-local" class="form-control" id="date_departure" name="date_departure" min="<?= date("Y-m-d\TH:i") ?>" required>
                    </div>


                    <!-- Ville d'arrivée -->
                    <div class="mb-4">
                        <label for="city_arrival" class="form-label">Ville d'arrivée</label>
                        <select id="city_arrival" class="form-control me-2 name_city" name="id_city_arrival"></select>
                    </div>

                    <!-- Adresse d'arrivée -->
                    <div class="mb-4">
                        <label for="adress_arrival" class="form-label">Adresse d'arrivé</label>
                        <input type="text" class="form-control" id="adress_arrival" name="adress_arrival" placeholder="Adresse d'arrivée" required>
                    </div>



                    <!-- Date et heure d'arrivée prévue -->
                    <div class="mb-4">
                        <label for="date_arrival" class="form-label">Date et heure d'arrivée </label>
                        <input type="datetime-local" class="form-control" id="date_arrival" name="date_arrival" min="<?= date("Y-m-d\TH:i") ?>" required>
                    </div>

                    <!-- Sélectionnez votre véhicule -->
                    <div class="mb-4">
                        <label for="car" class="form-label">Choisir  un véhicule</label>
                        <select id="car" class="form-select" name="id_car" required>
                            <option disabled selected>Véhicule</option>

                        </select>
                    </div>

                    <!-- Commentaire -->
                    <div class="mb-4">
                        <label for="comment" class="form-label">Avez-vous un commentaire ?</label>
                        <input type="text" class="form-control" id="comment" name="comment" placeholder="Entrez votre commentaire">
                    </div>

                </div>

                <!-- Footer avec bouton de sauvegarde -->
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-outline-primary px-4 py-2">Créer</button>
                </div>
            </form>
        </div>
    </div>
</div>