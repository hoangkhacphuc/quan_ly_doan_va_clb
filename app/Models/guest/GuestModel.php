<?php

namespace App\Models;

use CodeIgniter\Model;

class GuestModel extends Model {

    public function __construnct()
    {
        parent::__construnct();

    }

    public function getNotification()
    {
        $query =  $this->forge->get('notification');
        return $query;
    }
}