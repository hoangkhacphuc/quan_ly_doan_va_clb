<?php

namespace App\Models\admin;

use App\Models\HomeModel;

class ModelLienChiDoan extends HomeModel {
    public $database;
    public function __construct()
    {
        parent::__construct();
        $this->database = $this->dbTable('lienchidoan');
    }

    public function add($param1)
    {
        $data = array(
            'Name' => $param1,
        );
        $query = $this->database->insert($data);
        echo $query ? "Thêm thành công !" : "Thêm thất bại !";
    }
    public function update($param1,$param2)
    {
        $data = array(
            'Name' => $param2,
        );
        $this->database->where('ID', $param1);
        $query = $this->database->get();
        if ($query->getRow() == 0)
        {
            echo "Kiểm tra lại thông tin !";
            return;
        }
        $this->database->where('ID', $param1);
        $query = $this->database->update($data);
        echo $query ? "Cập nhật thành công !" : "Cập nhật thất bại !";
    }
    public function delete($param1)
    {
        $this->database->where('ID', $param1);
        $query = $this->database->get();
        if ($query->getRow() == 0)
        {
            echo "Kiểm tra lại thông tin !";
            return;
        }
        $this->database->where('ID', $param1);
        $query = $this->database->delete();
        echo $query ? "Xóa thành công !" : "Xóa thất bại !";
    }

}