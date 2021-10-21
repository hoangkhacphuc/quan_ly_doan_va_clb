<?php
namespace App\Models;

class HomeModel{
    public $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function dbTable($param)
    {
        return $this->db->table($param);
    }
}