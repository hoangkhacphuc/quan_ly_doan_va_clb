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
            return [];
        return $query->getResultArray();
    }

    public function getBanner()
    {
        $query = $this->dbTable('banner')->select('*')->get()->getResultArray();
        if (count($query) == 0)
            return [];
        return $query;
    }
}