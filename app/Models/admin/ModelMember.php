<?php

namespace App\Models\admin;

use App\Models\HomeModel;

class ModelMember extends HomeModel {
    public $database;
    public function __construct()
    {
        parent::__construct();
        $this->database = $this->dbTable('student');
    }

    public function add($param1,$param2,$param3,$param4,$param5,$param6,$param7,$param8,$param9,$param10,$param11,$param12,$param13,$param14)
    {
        $data = array(
            'Name' => $param1,
            'StudentID' => $param2,
            'ChiDoan' => $param3,
            'PhoneNumber' => $param4,
            'Email' => $param5,
            'DOB' => $param6,
            'Sex' => $param7,
            'Address' => $param8,
            'DateJoinUnion' => $param9,
            'AddressJoinUnion' => $param10,
            'DateJoinPaty' => $param11,
            'AddressJoinParty' => $param12,
            'Award' => $param13,
            'Punishment' => $param14,
            'Grade' => 0

        );
        $query = $this->database->insert($data);
        echo $query ? json_encode(array("Error" => "", "Done" => "Thêm thành công !")) : json_encode(array("Error" => "Thêm thất bại !"));
    }

    public function updateInfo($param1,$param2,$param3,$param4,$param5,$param6,$param7,$param8,$param9,$param10,$param11,$param12,$param13,$param14)
    {
        $lcd = $param2;
        $cd = $param3;
        $query = $this->dbTable('lienchidoan')->select('*')->where('Name', $lcd)->get()->getResultArray();
        $query = $this->dbTable('chidoan')->select('*')->where(array('Name' => $cd, 'LienChiDoan' => $query[0]['ID']))->get()->getResultArray();

        $data = array(
            'Name' => $param1,
            'Email' => $param5,
            'DOB' => $param6,
            'ChiDoan' => $query[0]['ID'],
            'Sex' => $param7,
            'Address' => $param8,
            'DateJoinUnion' => $param9,
            'AddressJoinUnion' => $param10,
            'DateJoinParty' => $param11,
            'AddressJoinParty' => $param12,
            'Award' => $param13,
            'Punishment' => $param14,
        );
        $query = $this->database->where('ID', $param4)->update($data);
        echo $query ? json_encode(array('status' => true, "message" => "Cập nhật thành công !")) : json_encode(array('status' => false, "message" => "Cập nhật thất bại !"));
    }

    public function deleteMember($id)
    {
        $query = $this->database->select('*')->where('ID', $id)->get()->getResultArray();
        if (empty($query) || count($query) == 0)
        {
            echo json_encode(array('status' => false, "message" => "Không tìm thấy tài khoản !"));
            return;
        }
        $query = $this->database->where('ID', $id)->delete();
        echo $query ? json_encode(array('status' => true, "message" => "Đã xóa tài khoản này !")) : json_encode(array('status' => false, "message" => "Xóa thất bại !"));
    }

}