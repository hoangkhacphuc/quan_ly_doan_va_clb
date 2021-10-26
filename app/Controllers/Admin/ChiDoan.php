<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\admin\ModelChiDoan;

class ChiDoan extends BaseController
{
    public $model;
    public function __construct()
    {
        $this->model = new ModelChiDoan();
    }

    public function add()
    {
        if (!isset($_POST['Name']))
        {
            echo "Thêm thất bại !";
            return;
        }
        $name = $_POST['Name'];
        $this->model->add($name);
    }

}
