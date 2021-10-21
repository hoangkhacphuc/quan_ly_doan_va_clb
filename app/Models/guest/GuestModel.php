<?php
namespace App\Models\guest;

use App\Models\HomeModel;

class GuestModel extends HomeModel {

    public function __construct()
    {
        parent::__construct();
    }

    public function getNotification()
    {
        $query = $this->db->table('notification')->select('Content')->where('Status = 0')->get();
        if ($query->getRow() == 0)
            return false;
        return $query->getResultArray();
    }
}