<?php

namespace App\Models\guest;

use App\Models\HomeModel;

class ModelUser extends HomeModel {

    public $database;
    public function __construct()
    {
        parent::__construct();
        $this->database = $this->dbTable('account');
    }

    public function login($user, $pass)
    {
        $data = array(
            'User' => $user,
            'Pass' => $pass,
        );
        $this->database->select('ID');
        $this->database->where($data);
        $query = $this->database->get();
        if ($query->getRowArray() == "" || count($query->getRowArray()) == 0)
            return 0;
        return $query->getResultArray()[0]['ID'];
    }
}



