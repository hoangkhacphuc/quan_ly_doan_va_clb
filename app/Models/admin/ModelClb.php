<?php

namespace App\Models\admin;

use App\Models\HomeModel;

class ModelClb extends HomeModel {
    public $database;
    public function __construct()
    {
        parent::__construct();
        $this->database = $this->dbTable('club');
    }

    public function add($param1,$param2,$param3)
    {
        $data = array(
            'Name' => $param1,
            'Avatar' => $param2,
            'FoundationDate' => $param3
        );
        $query = $this->database->insert($data);
        echo $query ? "Thêm Thành Công !" : "Thêm Thất Bại !";
    }
    public function update($param1,$param2,$param3,$param4)
    {
        $data = array(
            'Name' => $param2,
            'Avatar' => $param3,
            'FoundationDate' => $param4,
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