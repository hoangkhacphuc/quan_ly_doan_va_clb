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

    public function add($param1,$param2)
    {
        $data = array(
            'Name' => $param1,
            'Avatar' => $param2,
        );
        $query = $this->database->insert($data);
        echo $query ? "them thanh cong !" : "them that bai !";
    }

}