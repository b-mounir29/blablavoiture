<?php

namespace App\Models;

use CodeIgniter\Model;

class CarModel extends Model
{
    protected $table = 'car';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_user', 'id_modelcar', 'id_color', 'created_at', 'updated_at', 'deleted_at'];
    protected $useSoftDeletes = false;
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $deletedField = 'deleted_at';

public function getAllcar() {
    return $this->findAll();


}

    public function insertcar($data) {
        return $this->insert($data);
    }

    public function deletecar($data) {
    return $this->delete($data);
    }

//Gerer la pagination de la page
    public function getPaginated($start, $length, $searchValue, $orderColumnName, $orderDirection)
    {
        $builder = $this->builder();
        $this->select('car.id,car.created_at,car.updated_at,car.deleted_at, user.username,color.name as colorname, modelcar.name as modelcarname');
        $this->join('user','car.id_user=user.id');
        $this->join('color','car.id_color=color.id');
        $this->join('modelcar','car.id_modelcar=modelcar.id');
        //recherche
        if ($searchValue != null) {
            $builder->like('user.name', $searchValue);
            $builder->orLike('user.id', $searchValue);
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
        $this->join('user','car.id_user=user.id');
        $this->join('color','car.id_color=color.id');
        $this->join('modelcar','car.id_modelcar=modelcar.id');
        return $builder->countAllResults();
    }

    public function getFiltered($searchValue)
    {
        $builder = $this->builder();
        $this->select('car.id,car.created_at,car.updated_at,car.deleted_at, user.username,color.name as colorname, modelcar.name as modelcarname');
        $this->join('user','car.id_user=user.id');
        $this->join('color','car.id_color=color.id');
        $this->join('modelcar','car.id_modelcar=modelcar.name');

        // @phpstan-ignore-next-line
        if (! empty($searchValue)) {
            $builder->like('user.name', $searchValue);
            $builder->orLike('user.id', $searchValue);
        }
        return $builder->countAllResults();
    }
}


