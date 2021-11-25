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
        // if (!$this->load_Permissions(1))
        // {
        //     echo json_encode(array("Error" => "Không đủ quyền truy cập !"));
        //     return;
        // }
        if (!isset($_POST['Name']) && !isset($_POST['StudentID']) && !isset($_POST['PhoneNumber']) && !isset($_POST['Email']) && !isset($_POST['DOB']) && !isset($_POST['Sex']) && !isset($_POST['Address']) && !isset($_POST['ChiDoan']))
        {
            echo json_encode(array("Error" => "Thêm thất bại !"));
            return;
        }
        
        $name = $_POST['Name'];
        $studentid = $_POST['StudentID'];
        $chidoan = $_POST['ChiDoan'];
        $phonenumber = $_POST['PhoneNumber'];
        $email = $_POST['Email'];
        $dob = $_POST['DOB'];
        $sex = $_POST['Sex'];
        $addr = $_POST['Address'];
        $dateunion = $_POST['DateJoinUnion'];
        $addrunion = $_POST['AddressJoinUnion'];
        $dateparty = $_POST['DateJoinPaty'];
        $addrparty = $_POST['AddressJoinParty'];
        $award = $_POST['Award'];
        $punishment = $_POST['Punishment'];
        $grade = 0;
        $this->model->add($name,$studentid,$chidoan,$phonenumber,$email,$dob,$sex,$addr,$dateunion,$addrunion,$dateparty,$addrparty,$award,$punishment,$grade);
    }

}
