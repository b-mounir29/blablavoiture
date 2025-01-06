<?php

namespace App\Models;

use App\Database\Migrations\carbrand;
use CodeIgniter\Model;

class ModelModel extends Model
{
    protected $table            = 'modelcar';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['name', 'id_brand'];
    protected $useSoftDeletes   = false;

    //1- Récupérer tous les modèles (avec l'id,name,id_brand(marque de voiture)
    public function getAllModel() {
        return $this->findAll();
    }

    public function getModel($id) {
        return $this->find($id);
    }

    //2- create nouveau model -- enregistrer data dans bbd
    public function insertModel($data) {
        return $this->insert($data);
    }

    //3- update model
    public function updateModel($id, $data) {
        return $this->update($id, $data);
    }

    // suppression model
    public function deletemodel($id) {
        return $this->delete($id);
    }






    //Gerer la pagination de la page
    public function getPaginated($start, $length, $searchValue, $orderColumnName, $orderDirection)
    {
        $builder = $this->builder();
        $this->select('modelcar.id, modelcar.name, CarBrand.name as Marque,modelcar.id_brand');
        $this->join('CarBrand', 'CarBrand.id = modelcar.id_brand');

        //recherche
        if ($searchValue != null) {
            $builder->like('modelcar.name', $searchValue);
            $builder->orLike('CarBrand.name', $searchValue);
        }

        // Tri
        if ($orderColumnName && $orderDirection) {
            $builder->orderBy($orderColumnName, $orderDirection);
        }

        $builder->limit($length, $start);

        return $builder->get()->getResultArray();
    }



    public function getTotal()
    {
        //pas de select, juste la jointure
        $builder = $this->builder();
        $this->join('CarBrand', 'CarBrand.id = modelcar.id_brand');
        return $builder->countAllResults();
    }

    public function getFiltered($searchValue)
    {
        $builder = $this->builder();
        $this->select('modelcar.id, modelcar.name, CarBrand.name as Marque,modelcar.id_brand');
        $this->join('CarBrand', 'CarBrand.id = modelcar.id_brand');
        // @phpstan-ignore-next-line
        if (! empty($searchValue)) {
            $builder->like('modelcar.name', $searchValue);
            $builder->orLike('CarBrand.name', $searchValue);
        }
        return $builder->countAllResults();
    }


}