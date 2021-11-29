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

    public function update($param1, $param2)
    {
        $data = array(
            'Name' => $param2,
        );
        $this->database->where('ID', $param1);
        $query = $this->database->get();
        if ($query->getRow() == 0)
        {
            echo json_encode(array('status' => false, "message" => "Không tìm thấy Chi Đoàn !"));
            return;
        }
        $this->database->where('ID', $param1);
        $query = $this->database->update($data);
        echo $query ? json_encode(array('status' => true, "message" => "Cập nhật thành công !")) : json_encode(array('status' => false, "message" => "Cập nhật thất bại !"));
    }

    public function delete($param1)
    {
        $this->database->where('ID', $param1);
        $query = $this->database->get();
        if ($query->getRow() == 0)
        {
            echo json_encode(array('status' => false, "message" => "Không tìm thấy Chi Đoàn !"));
            return;
        }
        $query = $this->dbTable('student')->where('ChiDoan', $param1)->get()->getResultArray();
        if (!empty($query) && count($query) > 0)
        {
            echo json_encode(array('status' => false, "message" => "Có thành viên trong Chi Đoàn, không thể xóa !"));
            return;
        }
        $this->database->where('ID', $param1);
        $query = $this->database->delete();
        echo $query ? json_encode(array('status' => true, "message" => "Xóa thành công !")) : json_encode(array('status' => false, "message" => "Xóa thất bại !"));
    }
}