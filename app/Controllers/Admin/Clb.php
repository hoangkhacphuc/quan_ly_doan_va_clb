<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\admin\ModelClb;

class Clb extends BaseController
{
    public $model;
    public function __construct()
    {
        $this->model = new ModelClb();
    }

    public function add()
    {
        if (!isset($_POST['Name']) && !isset($_POST['Avatar']))
        {
            echo "Thêm thất bại !";
            return;
        }
        $name = $_POST['Name'];
        $avatar = $_POST['Avatar'];
        $foundationdate = $_POST['FoundationDate'];
        $this->model->add($name, $avatar,$foundationdate);
    }

    public function update()
    {
        if (!isset($_POST['ID']) && !isset($_POST['Avatar']) && !isset($_POST['Name']))
        {
            echo "Cập nhật thất bại !";
            return;
        }
        $ID = $_POST['ID'];
        $avatar = $_POST['Avatar'];
        $name = $_POST['Name'];
        $foundationdate = $_POST['FoundationDate'];

        $this->model->update($ID, $name, $avatar,$foundationdate);
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
