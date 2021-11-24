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
            echo json_encode(array("Error" => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['Name']) && !isset($_POST['StudentID']) && !isset($_POST['PhoneNumber']) && !isset($_POST['Email']) && !isset($_POST['DOB']) && !isset($_POST['Sex']) && !isset($_POST['Address']) && !isset($_POST['ChiDoan']))
        {
            echo json_encode(array("Error" => "Thêm thất bại !"));
            return;
        }
        
        $name = $_POST['Name'];
        $studentid = $_POST['StudentID'];
        $phonenumber = $_POST['PhoneNumber'];
        $email = $_POST['Email'];
        $dob = $_POST['DOB'];
        $sex = $_POST['Sex'];
        $addr = $_POST['Address'];
        $chidoan = $_POST['ChiDoan'];
        $grade = 0;
        $this->model->add($name,$studentid,$phonenumber,$email,$dob,$sex,$addr,$chidoan,$grade);
    }

}
