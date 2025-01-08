<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Trajet extends BaseController
{
    public function getindex()
    {
        return $this->view('trajet/publier');
    }
}
