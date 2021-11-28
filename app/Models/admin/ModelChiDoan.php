<?php

namespace App\Models\admin;

use App\Models\HomeModel;
use CodeIgniter\Database\Query;

class ModelChiDoan extends HomeModel {
    public $database;
    public function __construct()
    {
        parent::__construct();
        $this->database = $this->dbTable('chidoan');
    }

    public function add($param1,$param2)
    {
        $query = $this->dbTable('lienchidoan')->where('Name', $param2)->get()->getResultArray();
        if (!$query)
        {
            echo json_encode(array('status' => false, "message" => "Không tìm thấy Liên chi Đoàn !"));
            return;
        }
        $data = array(
            'Name' => $param1,
            'LienChiDoan' => $query[0]['ID']
        );
        $query = $this->database->insert($data);
        echo $query ? json_encode(array('status' => true, "message" => "Thêm thành công !")) : json_encode(array('status' => false, "message" => "Thêm thất bại !"));
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