<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\admin\ModelNotification;

class Notification extends BaseController
{
    public $model;
    public function __construct()
    {
        $this->model = new ModelNotification();
    }

    public function add()
    {
        if (!isset($_POST['Content']))
        {
            echo "Thêm thất bại !";
            return;
        }
        $content = $_POST['Content'];
        $this->model->add($content);
    }

    public function update()
    {
        if (!isset($_POST['ID']) && !isset($_POST['Content']) && !isset($_POST['Status']))
        {
            echo "Cập nhật thất bại !";
            return;
        }
        $ID = $_POST['ID'];
        $content = $_POST['Content'];
        $Status = $_POST['Status'];
        
        $this->model->update($ID, $content, $Status);
    }

    public function delete()
    {
        if (!isset($_POST['ID']))
        {
            echo "Xóa thất bại !";
            return;
        }
        $ID = $_POST['ID'];
        $this->model->delete($ID);
    }
}
