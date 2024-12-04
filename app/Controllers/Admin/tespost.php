public function postupdate() {
// Récupération des données envoyées via POST
$data = $this->request->getPost();

// Récupération du modèle UserModel
$um = Model("UserModel");

// Vérifier si un fichier a été soumis dans le formulaire
$file = $this->request->getFile('profile_image'); // 'profile_image' est le nom du champ dans le formulaire
$permis = $this->request->getFile('permis_image'); // 'permis_image' est le nom du champ dans le formulaire
$card = $this->request->getFile('card_image');
// Si un fichier a été soumis
if ($file && $file->getError() !== UPLOAD_ERR_NO_FILE) {
// Récupération du modèle MediaModel
$mm = Model('MediaModel');

// Préparer les données du média pour le nouvel upload
$mediaData = [
'entity_type' => 'user',
'entity_id'   => $data['id'],   // Utiliser l'ID de l'utilisateur
];

// Utiliser la fonction upload_file() pour gérer l'upload et enregistrer les données du média
$uploadResult = upload_file($file, 'avatar', $data['username'], $mediaData, false, ['image/jpeg', 'image/png','image/jpg']);
// Vérifier le résultat de l'upload
if (is_array($uploadResult) && $uploadResult['status'] === 'error') {
// Afficher un message d'erreur détaillé et rediriger
$this->error("Une erreur est survenue lors de l'upload de l'image : " . $uploadResult['message']);
return $this->redirect("/admin/user");
}


}

if ($permis && $permis->getError() !== UPLOAD_ERR_NO_FILE) {
$mm = Model('MediaModel');
// Préparer les données du média pour le nouvel upload
$mediaData = [
'entity_type' => 'license',
'entity_id'   => $data['id'],   // Utiliser l'ID de l'utilisateur
];

// Utiliser la fonction upload_file() pour gérer l'upload et enregistrer les données du média
$uploadResult = upload_file($permis, 'permis', $data['username'], $mediaData, false, ['image/jpeg', 'image/png','image/jpg']);
// Vérifier le résultat de l'upload
if (is_array($uploadResult) && $uploadResult['status'] === 'error') {
// Afficher un message d'erreur détaillé et rediriger
$this->error("Une erreur est survenue lors de l'upload de l'image : " . $uploadResult['message']);
return $this->redirect("/admin/user");
}



if ($card && $card->getError() !== UPLOAD_ERR_NO_FILE) {
$mm = Model('MediaModel');
$mediaData = [
'entity_type' => 'card',
'entity_id'   => $data['id'],
];

$uploadResult = upload_file($card, 'card', $data['username'], $mediaData, false, ['image/jpeg', 'image/png','image/jpg']);
if (is_array($uploadResult) && $uploadResult['status'] === 'error') {
$this->error("Une erreur est survenue lors de l'upload de l'image : " . $uploadResult['message']);
return $this->redirect("/admin/user");
}
}
}


// Mise à jour des informations utilisateur dans la base de données
if ($um->updateUser($data['id'], $data)) {
$this->success("L'utilisateur a bien été modifié.");
} else {
$errors = $um->errors();
foreach ($errors as $error) {
$this->error($error);
}
}

// Redirection vers la page des utilisateurs après le traitement
return $this->redirect("/admin/user");
}

