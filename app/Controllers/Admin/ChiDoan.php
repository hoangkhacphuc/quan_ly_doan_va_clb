<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\admin\ModelChiDoan;

class ChiDoan extends BaseController
{
    public $model;
    public function __construct()
    {
        $this->model = new ModelChiDoan();
    }

    public function add()
    {
        if (!isset($_POST['Name']) && !isset($_POST['LienChiDoan']))
        {
            echo "Thêm thất bại !";
            return;
        }
        $name = $_POST['Name'];
        $lienchidoan = $_POST['LienChiDoan'];
        $this->model->add($name,$lienchidoan);
    }

    public function update()
    {
        if (!isset($_POST['ID']) && !isset($_POST['Name']) && !isset($_POST['LienChiDoan']))
        {
            echo "Cập nhật thất bại !";
            return;
        }
        $ID = $_POST['ID'];
        $name = $_POST['Name'];
        $lienchidoan = $_POST['LienChiDoan'];
        
        $this->model->update($ID, $name, $lienchidoan);
    }

    public function delete()
    {
        if (!isset($_POST['ID']))
        {
            echo "Xóa thất bại !";
            return;
        }
        $ID = $_POST['ID'];
        $this->model->delete($ID);
    }
}
