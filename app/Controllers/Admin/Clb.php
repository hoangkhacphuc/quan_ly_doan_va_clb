<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\admin\ModelClb;

class Clb extends BaseController
{
    public $model;
    public function __construct()
    {
        $this->model = new ModelClb();
    }

    public function add()
    {
        if (!isset($_POST['Name']) && !isset($_POST['Avatar']))
        {
            echo "Thêm thất bại !";
            return;
        }
        $name = $_POST['Name'];
        $avatar = $_POST['Avatar'];
        $this->model->add($name, $avatar);
    }

}
