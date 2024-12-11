<?php

namespace App\Models;

use CodeIgniter\Model;

class ColorModel extends Model
{
protected $table = 'color';
protected $primaryKey = 'id';
protected $useAutoIncrement = true;
protected $allowedFields = ['name'];
protected$useSoftDeletes = false;


        //1-Recuperer les colors
    public function getAllColor() {
    return $this->findAll();
}
        //ajout colors
    public function insertColor($data) {
        return $this->insert($data);
}

        //suppression colors
    public function deleteColor($id) {
        return $this->delete($id);
    }




//Gestion de pagination
    public function getPaginated($start, $length, $searchValue, $orderColumnName, $orderDirection)
    {
        $builder = $this->builder();
        $this->select('color.id as id, color.name as Color',);

        //recherche
        if ($searchValue != null) {
            $builder->like('color.id', $searchValue);
            $builder->orLike('color.name', $searchValue);
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
        $this->select('color.id as id, color.name as color',);
        // @phpstan-ignore-next-line
        if (! empty($searchValue)) {
            $builder->like('color.id', $searchValue);
            $builder->orLike('color.name', $searchValue);
        }
        return $builder->countAllResults();
    }


}