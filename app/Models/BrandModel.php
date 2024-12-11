<?php

namespace App\Models;

use CodeIgniter\Model;

class BrandModel extends Model
{
    protected $table = 'CarBrand';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [ 'name'];
    protected $useSoftDeletes = false;


    // Récupérer toutes les marques des voitures
    public function getAllBrand()
    {
        return $this->findAll();
    }

    // Gestion create + update + delete brand

        // 1- gestion create
    public function insertBrand($data) {
       return $this->insert($data);
    }


        //2- suppression marque
    public function deleteBrand($id) {
        return $this->delete($id);
    }








    //Gestion de pagination
    public function getPaginated($start, $length, $searchValue, $orderColumnName, $orderDirection)
    {
        $builder = $this->builder();
        $this->select('CarBrand.id as id, CarBrand.name as Marque',);

        //recherche
        if ($searchValue != null) {
            $builder->like('CarBrand.id', $searchValue);
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
        return $builder->countAllResults();
    }

    public function getFiltered($searchValue)
    {
        $builder = $this->builder();
        $this->select('CarBrand.id as id, CarBrand.name as Marque',);
        // @phpstan-ignore-next-line
        if (! empty($searchValue)) {
            $builder->like('CarBrand.id', $searchValue);
            $builder->orLike('CarBrand.name', $searchValue);
        }
        return $builder->countAllResults();
    }

}