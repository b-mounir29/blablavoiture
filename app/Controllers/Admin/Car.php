<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Car extends BaseController
{
    protected $require_auth = true;
    protected $requiredPermissions = ['administrateur'];
    protected $breadcrumb =  [['text' => 'Tableau de Bord','url' => '/admin/dashboard'],['text'=> 'Gestion des utilisateurs', 'url' => '/admin/user']];
    public function getindex () {
    return $this->view('/admin/car/index',[], true);

    }
}