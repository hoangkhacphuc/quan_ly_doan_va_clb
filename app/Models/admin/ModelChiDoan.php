<?php

namespace App\Models\admin;

use App\Models\HomeModel;

class ModelChiDoan extends HomeModel {
    public $database;
    public function __construct()
    {
        parent::__construct();
        $this->database = $this->dbTable('chidoan');
    }

    public function add($param1)
    {
        $data = array(
            'Name' => $param1,
        );
        $query = $this->database->insert($data);
        echo $query ? "Them thanh cong " : "Them that bai !";
    }

}