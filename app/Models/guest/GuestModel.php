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

    public function upload_banner($url)
    {
        $query = $this->dbTable('banner')->insert(array('Image' => $url));
        echo $query ? json_encode(array("Error" => "", "Done" => "Thêm thành công !")) : json_encode(array("Error" => "Thêm thất bại !"));
    }

    public function getPosts($type = 0)
    {
        $data = $this->dbTable('post')->select('*')->where('Type', $type)->limit(6)->orderby('ID', 'DESC')->get()->getResultArray();
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['Author'] = $this->dbTable('student')->select('*')->where('ID', $data[$i]['Author'])->get()->getResultArray()[0]['Name'];
        }
        return $data;
    }
}