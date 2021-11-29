<?php

namespace App\Models\admin;

use App\Models\HomeModel;

class ModelIndex extends HomeModel
{
    public function index()
    {
        echo "123";
    }

    public function getNotification()
    {
        $query = $this->dbTable('notification')->select('*')->get()->getResultArray();
        return $query;
    }

    public function banner_delete($img)
    {
        $query = $this->dbTable('banner')->select('*')->where('Image', $img)->get()->getResultArray();
        if (empty($query) || count($query) == 0)
        {
            echo json_encode(array("Error" => "Không tìm thấy ảnh này !"));
            return;
        }
        $query = $this->dbTable('banner')->where('Image', $img)->delete();
        echo $query ? json_encode(array("Error" => "", "Done" => "Xóa thành công !")) : json_encode(array("Error" => "Xóa thất bại !"));
    }

    public function getPosition()
    {
        return $this->dbTable('position')->select('*')->get()->getResultArray();
    }
}