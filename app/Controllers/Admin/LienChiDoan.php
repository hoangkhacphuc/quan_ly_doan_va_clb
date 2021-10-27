<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\admin\ModelLienChiDoan;

class LienChiDoan extends BaseController
{
    public $model;
    public function __construct()
    {
        $this->model = new ModelLienChiDoan();
    }

    public function add()
    {
        if (!isset($_POST['Name']) && !isset($_POST['ID']))
        {
            echo "Thêm thất bại !";
            return;
        }
        $name = $_POST['Name'];
        $this->model->add($name);
    }

    public function update()
    {
        if (!isset($_POST['ID']) &&  !isset($_POST['Name']))
        {
            echo "Cập nhật thất bại !";
            return;
        }
        $ID = $_POST['ID'];
        $name = $_POST['Name'];
        
        $this->model->update($ID, $name);
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
