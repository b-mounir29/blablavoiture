<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Database\Seeds\CarModel;

class Car extends BaseController
{
    protected $title = "car";
    protected $require_auth = true;
    protected $requiredPermissions = ['administrateur'];
    public function getindex()
    {
        return $this->view('admin/car/index', [], true);
    }

        // Gestion des modèles de voitures :
                //1-getmodel pour recuperer les models de voiture et les envoyer vers la vue
                //2- foreach des CarBrand  dans la vue model
    public function getmodel($id=null)
    {
        $model= model('ModelModel')->getAllmodel();
        if($id==null) {
            //2-récuperer la liste des voiture et les envoyer dans la vue "model"-- la variable qui stocke la liste des marques, déclarée dans la function getbrand(L34), pour le foreach dans l'ajout d'un modèl
            $marques = model('BrandModel')->getAllBrand();
            return $this->view("admin/car/model", ['models' => $model, 'marques' => $marques], true); // variable marques  pour le foreach, à récupérer dans la view pour le foreach
        }
        if ($id) {
            return $this->view('admin/car/edit/model', ['models'=>$model],true);
        }
    }

        //3- creation dun nouveau model de voiture

    public function postcreatemodel()
    {
        $data = $this->request->getPost();
        $ibm = model('ModelModel');
        // test pour voir si le name existe déjà dans ma bbd, empecher d'ajouter
        if ($ibm->where('name', $data['name'])->find()) {
            $this->error('Le model existe déjà');
        } else {
            if ($ibm->insert($data)) {
                $this->success('model ajouté');
            } else {
                $this->error('Ajout non effectué');
            }
        }
        $this->redirect('/admin/car/model');
    }


    //4- modifier un model de voiture

    public function postupdatemodel() {
        $data = $this->request->getPost();
        $ibm = Model('ModelModel');
        if ($ibm->update($data['id'],$data)) {
            $this->success('Model modifié');
        } else {
            $this->error('Model non modifié');
        }
        $this->redirect('/admin/car/model');
    }


    //5- supprimer un model-voiture
    public function getdeletemodel($id) {
        $ibm = Model('ModelModel');
        if ($ibm->delete($id)) {
            $this->success("Model supprimé");
        } else {
            $this->error("model non supprimé");
        }
        $this->redirect('/admin/car/model');
    }





//gestion des marques de voiture


                // 1 - récupérer la liste des marque de voiture pour les afficher dans ma vue brand
    public function getbrand($id=null) {
        $marques=model('BrandModel')->getAllBrand();
        if($id==null){
            return $this->view("admin/car/brand", ['marques'=>$marques], true);
        }
        if($id) {
            return $this->view('admin/car/edit/brand',['marques'=>$marques], true);
        }
    }
                //2 - ajouter une marque

    public function postcreatebrand() {
        $data = $this->request->getPost();
        $ibm = model('BrandModel');
        if ($ibm->where('name', $data['name'])->find()) {
            $this->error('La marque existe déjà');
        } else {
            if ($ibm->insert($data)) {
                $this->success('Marque ajouté');
        } else {
            $this->error('Ajout non effectué');
            }
        }
        $this->redirect('/admin/car/brand');
    }

    //2 modifier une marque
    public function postupdatebrand() {
        $data = $this->request->getPost();
        $ibm = model('BrandModel');
        if ($ibm->update($data['id'],$data)) {
            $this->success('La marque a bien été modifiée');
        } else {
            $this->error('Erreur de modification');
        }
        $this->redirect('/admin/car/brand');
    }


    // 3- supprimer une marque
    public function getdeletebrand($id) {
        $ibm = model('BrandModel');
        if ($ibm->delete($id)) {
            $this->success('Marque supprimée');
        } else {
            $this->error('suppression échouée');
        }
         $this->redirect('/admin/car/brand');
    }



// Gestion de ColorModel

        //1- recuperer colors et afficher dans la vue
    public function getcolor($id=null) {
        $colors = model('ColorModel')->getAllColor();
        if($id==null) {
            return $this->view('admin/car/color',['colors' =>$colors],true);
        }

        if ($id) {
            return $this->view('admin/car/edit/color', ['colors' => $colors], true);
        }
    }



         //2- ajout d'une couleur
    public function postcreatecolor() {
        $data = $this->request->getPost();
        $ibm = model('ColorModel');
        if ($ibm->where('name', $data['name'])->find()) {
            $this->error('Couler existe déjà');
        } else {
            if ($ibm->insert($data)) {
                $this->success('couleur ajoutée');
            } else {
                $this->error('ajout non effectué');
            }
        }
        $this->redirect('/admin/car/color');
    }

        //3- update couleur
    public function postupdatecolor() {
    $data = $this->request->getPost();
    $ibm = model('ColorModel');
    if ($ibm->update($data['id'],$data)) {
        $this->success('La marque a bien été modifiée');
    } else {
    $this->error('Erreur de modification');
    }
    $this->redirect('/admin/car/color');
    }

        //4- delete couleur
    public function getdeleteColor($id) {
        $ibm = model('ColorModel');
        if ($ibm->delete($id)) {
            $this->success('La couleur est supprimée');
        } else {
            $this->error('La suppression a échouee');
        }
        $this->redirect('/admin/car/color');
    }








// gestion de pagination de la page (model)admin/car/model
    public function postSearchdatatable()
    {
    $model_name = $this->request->getPost('model');
    $model = model($model_name);
        // Paramètres de pagination et de recherche envoyés par DataTables
        $draw        = $this->request->getPost('draw');
        $start       = $this->request->getPost('start');
        $length      = $this->request->getPost('length');
        $searchValue = $this->request->getPost('search')['value'];

        // Obtenez les informations sur le tri envoyées par DataTables
        $orderColumnIndex = $this->request->getPost('order')[0]['column'] ?? 0;
        $orderDirection = $this->request->getPost('order')[0]['dir'] ?? 'asc';
        $orderColumnName = $this->request->getPost('columns')[$orderColumnIndex]['data'] ?? 'id';


        // Obtenez les données triées et filtrées
        $data = $model->getPaginated($start, $length, $searchValue, $orderColumnName, $orderDirection);

        // Obtenez le nombre total de lignes sans filtre
        $totalRecords = $model->getTotal();

        // Obtenez le nombre total de lignes filtrées pour la recherche
        $filteredRecords = $model->getFiltered($searchValue);

        $result = [
            'draw'            => $draw,
            'recordsTotal'    => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data'            => $data,
        ];
        return $this->response->setJSON($result);
    }
}
