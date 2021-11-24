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

    public function add($param1,$param2,$param3,$param4,$param5,$param6,$param7,$param8)
    {
        $data = array(
            'Name' => $param1,
            'StudentID' => $param2,
            'PhoneNumber' => $param3,
            'Email' => $param4,
            'DOB' => $param5,
            'Sex' => $param6,
            'Address' => $param7,
            'ChiDoan' => $param8,
            'Grade' => 0

        );
        $query = $this->database->insert($data);
        echo $query ? json_encode(array("Error" => "", "Done" => "Thêm thành công !")) : json_encode(array("Error" => "Thêm thất bại !"));
    }

    public function update($param1, $param2, $param3)
    {
        $data = array(
            'Name' => $param2,
            'LienChiDoan' => $param3,
        );
        $this->database->where('ID', $param1);
        $query = $this->database->get();
        if ($query->getRow() == 0)
        {
            echo json_encode(array("Error" => "Kiểm tra lại thông tin !"));
            return;
        }
        $this->database->where('ID', $param1);
        $query = $this->database->update($data);
        echo $query ? json_encode(array("Error" => "", "Done" => "Cập nhật thành công !")) : json_encode(array("Error" => "Cập nhật thất bại !"));
    }

    public function delete($param1)
    {
        $this->database->where('ID', $param1);
        $query = $this->database->get();
        if ($query->getRow() == 0)
        {
            echo json_encode(array("Error" => "Kiểm tra lại thông tin !"));
            return;
        }
        $this->database->where('ID', $param1);
        $query = $this->database->delete();
        echo $query ? json_encode(array("Error" => "", "Done" => "Xóa thành công !")) : json_encode(array("Error" => "Xóa thất bại !"));
    }
}