<?php

namespace App\Models\admin;

use App\Models\HomeModel;

class ModelNotification extends HomeModel {
    public $database;
    public function __construct()
    {
        parent::__construct();
        $this->database = $this->dbTable('notification');
    }

    public function add($param1)
    {
        $data = array(
            'Content' => $param1,
        );
        $query = $this->database->insert($data);

        echo $query ? json_encode(array("Error" => "", "Done" => "Thêm thành công !")) : json_encode(array("Error" => "Thêm thất bại !"));
    }

    public function update($param1, $param2, $param3)
    {
        $data = array(
            'Content' => $param2,
            'Status' => $param3,
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