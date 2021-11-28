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
        if (!$this->load_Permissions(2))
        {
            echo json_encode(array('status' => false, "message" => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['Name']))
        {
            echo json_encode(array('status' => false, "message" => "Chưa nhập tên Liên chi Đoàn !"));
            return;
        }
        
        $name = $_POST['Name'];
        $this->model->add($name);
    }
    
    public function update()
    {
        if (!$this->load_Permissions(2))
        {
            echo json_encode(array("Error" => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['ID']) &&  !isset($_POST['Name']))
        {
            echo json_encode(array("Error" => "Cập nhật thất bại !"));
            return;
        }
        $ID = $_POST['ID'];
        $name = $_POST['Name'];
        
        $this->model->update($ID, $name);
    }

    public function delete()
    {
        if (!$this->load_Permissions(2))
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
