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
        if (!$this->load_Permissions(3))
        {
            echo json_encode(array("Error" => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['Name']) && !isset($_POST['Avatar']))
        {
            echo json_encode(array("Error" => "Thêm thất bại !"));
            return;
        }
        
        $name = $_POST['Name'];
        $avatar = $_POST['Avatar'];
        $foundationdate = $_POST['FoundationDate'];
        $this->model->add($name, $avatar,$foundationdate);
    }

    public function update()
    {
        if (!$this->load_Permissions(3))
        {
            echo json_encode(array("Error" => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['ID']) && !isset($_POST['Avatar']) && !isset($_POST['Name']))
        {
            echo json_encode(array("Error" => "Cập nhật thất bại !"));
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
        if (!$this->load_Permissions(3))
        {
            echo json_encode(array("Error" => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['ID']))
        {
            echo json_encode(array("Error" => "Xóa thất bại !"));
            return;
        }
        $ID = $_POST['ID'];
        $this->model->delete($ID);
    }
}
