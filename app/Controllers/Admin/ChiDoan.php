<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\admin\ModelChiDoan;

class ChiDoan extends BaseController
{
    public $model;
    public $lienchidoan_model;
    public function __construct()
    {
        $this->model = new ModelChiDoan();
        $this->lienchidoan_model = model('App\Models\admin\ModelLienChiDoan');
    }

    public function add()
    {
        if (!$this->load_Permissions(2))
        {
            echo json_encode(array('status' => false, "message" => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['Name']) || !isset($_POST['LienChiDoan']))
        {
            echo json_encode(array('status' => false, "message" => "Chưa đủ thông tin !"));
            return;
        }
        if ($_POST['LienChiDoan'] == 'Liên chi Đoàn')
        {
            echo json_encode(array('status' => false, "message" => "Chưa chọn Liên chi Đoàn !"));
            return;
        }
        
        $name = $_POST['Name'];
        $lienchidoan = $_POST['LienChiDoan'];

        $this->model->add($name,$lienchidoan);
    }

    public function getChiDoan()
    {
        if (!$this->load_Permissions(2))
        {
            echo json_encode(array('status' => false, "message" => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['LienChiDoan']))
        {
            echo json_encode(array('status' => false, "message" => "Chưa đủ thông tin !"));
            return;
        }
        if ($_POST['LienChiDoan'] == 'Liên chi Đoàn')
        {
            echo json_encode(array('status' => false, "message" => "Chưa chọn Liên chi Đoàn !"));
            return;
        }
        $this->lienchidoan_model->getCD($_POST['LienChiDoan']);
    }

    public function getStudent()
    {
        if (!$this->load_Permissions(2))
        {
            echo json_encode(array('status' => false, "message" => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['LienChiDoan']) || !isset($_POST['ChiDoan']))
        {
            echo json_encode(array('status' => false, "message" => "Chưa đủ thông tin !"));
            return;
        }
        if ($_POST['LienChiDoan'] == 'Liên chi Đoàn')
        {
            echo json_encode(array('status' => false, "message" => "Chưa chọn Liên chi Đoàn !"));
            return;
        }
        if ($_POST['ChiDoan'] == 'Chi Đoàn')
        {
            echo json_encode(array('status' => false, "message" => "Chưa chọn Chi Đoàn !"));
            return;
        }

        $this->lienchidoan_model->getStudent($_POST['LienChiDoan'], $_POST['ChiDoan']);
    }

    public function getStudentData()
    {
        if (!$this->load_Permissions(2))
        {
            echo json_encode(array('status' => false, "message" => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['ID']))
        {
            echo json_encode(array('status' => false, "message" => "Chưa đủ thông tin !"));
            return;
        }

        $this->lienchidoan_model->getStudentData($_POST['ID']);
    }

    public function update()
    {
        if (!$this->load_Permissions(2))
        {
            echo json_encode(array("Error" => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['ID']) && !isset($_POST['Name']) && !isset($_POST['LienChiDoan']))
        {
            echo json_encode(array("Error" => "Cập nhật thất bại !"));
            return;
        }
        $ID = $_POST['ID'];
        $name = $_POST['Name'];
        $lienchidoan = $_POST['LienChiDoan'];
        
        $this->model->update($ID, $name, $lienchidoan);
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
