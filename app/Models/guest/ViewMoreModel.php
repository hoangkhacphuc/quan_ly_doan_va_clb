<?php

namespace App\Models\guest;

use App\Models\HomeModel;

class ViewMoreModel extends HomeModel {

    public $database;
    public function __construct()
    {
        parent::__construct();
        $this->database = $this->dbTable('post');
    }

    public function viewPosts($limit)
    {
        $data = $this->database->select('*')->where('Type', '0')->limit($limit*10, ($limit + 1)*10)->orderBy('ID', 'DESC')->get()->getResultArray();
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['Author'] = $this->dbTable('student')->select('*')->where('ID', $data[$i]['Author'])->get()->getResultArray()[0]['Name'];
            $data[$i]['Posting'] = date('\N\g\à\y d m, Y', strtotime($data[$i]['Posting']));
        }
        return $data;
    }

    public function getCountPosts()
    {
        return $this->database->select('count(ID)')->where('Type', '0')->get()->getResultArray()[0]['count(ID)'];
    }

    public function viewEvent($limit)
    {
        $data = $this->database->select('*')->where('Type', '1')->limit($limit*10, ($limit + 1)*10)->orderBy('ID', 'DESC')->get()->getResultArray();
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['Author'] = $this->dbTable('student')->select('*')->where('ID', $data[$i]['Author'])->get()->getResultArray()[0]['Name'];
            $data[$i]['Posting'] = date('\N\g\à\y d m, Y', strtotime($data[$i]['Posting']));
        }
        return $data;
    }

    public function viewEventTookPlace($limit)
    {
        $date = date('Y-m-d');
        $data = array(
            'Type' => '1',
            'End <' => $date,
        );
        $data = $this->database->select('*')->where($data)->limit($limit*10, ($limit + 1)*10)->orderBy('ID', 'DESC')->get()->getResultArray();
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['Author'] = $this->dbTable('student')->select('*')->where('ID', $data[$i]['Author'])->get()->getResultArray()[0]['Name'];
            $data[$i]['Posting'] = date('\N\g\à\y d m, Y', strtotime($data[$i]['Posting']));
        }
        return $data;
    }

    public function viewEventHappening($limit)
    {
        $date = date('Y-m-d');
        $data = array(
            'Type' => '1',
            'Start <=' => $date,
            'End >=' => $date,
        );
        $data = $this->database->select('*')->where($data)->limit($limit*10, ($limit + 1)*10)->orderBy('ID', 'DESC')->get()->getResultArray();
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['Author'] = $this->dbTable('student')->select('*')->where('ID', $data[$i]['Author'])->get()->getResultArray()[0]['Name'];
            $data[$i]['Posting'] = date('\N\g\à\y d m, Y', strtotime($data[$i]['Posting']));
        }
        return $data;
    }

    public function getCountEvent()
    {
        return $this->database->select('count(ID)')->where('Type', '1')->get()->getResultArray()[0]['count(ID)'];
    }

    public function getCountEventTookPlace()
    {
        $date = date('Y-m-d');
        $data = array(
            'Type' => '1',
            'End <' => $date,
        );
        $date = date('Y-m-d');
        return $this->database->select('count(ID)')->where($data)->get()->getResultArray()[0]['count(ID)'];
    }

    public function getCountEventHappening()
    {
        $date = date('Y-m-d');
        $data = array(
            'Type' => '1',
            'Start <=' => $date,
            'End >=' => $date,
        );
        return $this->database->select('count(ID)')->where($data)->get()->getResultArray()[0]['count(ID)'];
    }

}
