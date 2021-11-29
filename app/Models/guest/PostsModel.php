<?php

namespace App\Models\guest;

use App\Models\HomeModel;

class PostsModel extends HomeModel {

    public $database;
    public function __construct()
    {
        parent::__construct();
        $this->database = $this->dbTable('post');
    }

    public function getPost($id)
    {
        return $this->database->select('*')->where('ID', $id)->get()->getResultArray();
    }
}
