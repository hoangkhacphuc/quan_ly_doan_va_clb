<?php
namespace App\Models\guest;

use App\Models\HomeModel;

class GuestModel extends HomeModel {

    public $modelNotification;
    public $modelStudent;

    public function __construct()
    {
        parent::__construct();
        $this->modelNotification = $this->dbTable('notification');
        $this->modelStudent = $this->dbTable('student');
    }

    public function getNotification()
    {
        $query = $this->modelNotification->select('Content')->where('Status = 0')->get();
        if ($query->getRow() == 0)
            return false;
        return $query->getResultArray();
    }

    public function getInfo($ID)
    {
        $this->modelStudent->select('Name, Avatar, Sex, Grade');
        $this->modelStudent->where('ID', $ID);
        $query = $this->modelStudent->get();

        if ($query->getRowArray() == "" || count($query->getRowArray()) == 0)
            return false;
        return $query->getResultArray();
    }
}