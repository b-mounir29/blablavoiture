<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Item extends BaseController
{
    public function getindex()
    {
        return $this->view('admin/item/index',[],true);
    }

    public function getnew() {

        return $this->view('admin/item/item',[],true);
    }

    public function getupdate($id) {
        $im=model('ItemModel')->getItem($id);
        return $this->view('admin/item/updateitem',['item'=>$im],true);

    }


    public function postcreateitem() {
        $data = $this->request->getPost();
        $im = model('ItemModel');
        if ($im->insertItem($data)) {
            $this->success('item ajouté');
            $this->redirect('/admin/item');
        } else {
            $this->error('ajout non effectué');
            $this->redirect('admin/item');
        }
    }

    public function postupdateitem() {
        $data = $this->request->getPost();
        $im = model('ItemModel');
        if ($im->update($data['id'],$data)) {
            $this->success('item modifié');
        } else {
            $this->error('item non modifié');
        }
        $this->redirect('/admin/item');
    }
}
