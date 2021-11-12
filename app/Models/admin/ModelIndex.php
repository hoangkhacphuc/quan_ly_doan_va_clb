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
}