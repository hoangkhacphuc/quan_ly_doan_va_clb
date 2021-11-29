<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\admin\ModelMember;

class Member extends BaseController
{
    public $model;
    public function __construct()
    {
        $this->model = new ModelMember();
    }

    public function add()
    {
        if (!$this->load_Permissions(1))
        {
            echo json_encode(array('status' => false, "message" => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['Name']) || !isset($_POST['Position']) || !isset($_POST['StudentID']) || !isset($_POST['Email']) || !isset($_POST['ChiDoan']) || !isset($_POST['LienChiDoan']))
        {
            echo json_encode(array('status' => false, "message" => "Chưa đủ thông tin !"));
            return;
        }
        
        $name = $_POST['Name'];
        $studentid = $_POST['StudentID'];
        $chidoan = $_POST['ChiDoan'];
        $lienchidoan = $_POST['LienChiDoan'];
        $email = $_POST['Email'];
        $Position = $_POST['Position'];
        $this->model->add($name,$studentid,$chidoan,$email, $lienchidoan, $Position);
    }

    public function update()
    {
        if (!$this->load_Permissions(2))
        {
            echo json_encode(array('status' => false, "message" => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['Name'])|| !isset($_POST['Punishment'])|| !isset($_POST['DateJoinParty']) || !isset($_POST['AddressJoinParty']) || !isset($_POST['Award']) || !isset($_POST['AddressJoinUnion']) || !isset($_POST['ID']) || !isset($_POST['LCD']) || !isset($_POST['Email']) || !isset($_POST['DOB']) || !isset($_POST['Sex']) || !isset($_POST['Address']) || !isset($_POST['DateJoinUnion'])|| !isset($_POST['ChiDoan']))
        {
            echo json_encode(array("Error" => "Chưa nhập đủ thông tin !"));
            return;
        }
        $code = null;
        $position = null;
        if (isset($_POST['StudentID']) && isset($_POST['Position']))
        {
            $code = $_POST['StudentID'];
            $position = $_POST['Position'];
        }
        
        $id = $_POST['ID'];
        $name = $_POST['Name'];
        $chidoan = $_POST['ChiDoan'];
        $lienchidoan = $_POST['LCD'];
        $email = $_POST['Email'];
        $dob = $_POST['DOB'];
        $sex = $_POST['Sex'];
        $addr = $_POST['Address'];
        $dateunion = $_POST['DateJoinUnion'];
        $addrunion = $_POST['AddressJoinUnion'];
        $dateparty = $_POST['DateJoinParty'];
        $addrparty = $_POST['AddressJoinParty'];
        $award = $_POST['Award'];
        $punishment = $_POST['Punishment'];
        $this->model->updateInfo($name,$lienchidoan,$chidoan, $id ,$email,$dob,$sex,$addr,$dateunion,$addrunion,$dateparty,$addrparty,$award,$punishment, $code, $position);
    }

    public function search()
    {
        if (!$this->load_Permissions(1))
        {
            echo json_encode(array('status' => false, "message" => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['inp']))
        {
            echo json_encode(array('status' => false, "message" => "Chưa đủ thông tin !"));
            return;
        }

        $this->model->search($_POST['inp']);
    }

    public function delete()
    {
        if (!$this->load_Permissions(1))
        {
            echo json_encode(array('status' => false, "message" => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['ID']))
        {
            echo json_encode(array('status' => false, "message" => "Chưa đủ thông tin !"));
            return;
        }
        $this->model->deleteMember($_POST['ID']);
    }
    
}
