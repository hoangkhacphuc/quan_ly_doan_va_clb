<?php

namespace App\Models\admin;

use App\Models\HomeModel;

class ModelPost extends HomeModel {
    public $database;
    public function __construct()
    {
        parent::__construct();
        $this->database = $this->dbTable('post');
    }
    public function add($param1, $param2, $param3, $param4, $param5, $param6 ,$param7, $param8)
    {
        $data = array(
            'Title' => $param1,
            'Content' => $param2,
            'Author' => $param3,
            'Posting' => $param4,
            'Type' => $param5,
            'Hide' => $param6,
            'Image' => $param7,
            "Privacy" => $param8,
        );
        $query = $this->database->insert($data);
        echo $query ? "Thêm thành công  !" : "Thêm thất bại !";
    }
    public function update($param1, $param2, $param3, $param4, $param5, $param6 ,$param7, $param8, $param9)
    {
        $data = array(
            'Title' => $param2,
            'Content' => $param3,
            'Author' => $param4,
            'Posting' => $param5,
            'Type' => $param6,
            'Hide' => $param7,
            'Image' => $param8,
            "Privacy" => $param9,
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