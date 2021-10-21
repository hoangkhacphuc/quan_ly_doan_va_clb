<?php

namespace App\Controllers;

class Home extends BaseController
{
    public $model;

    public function index()
    {
        $data = [];
        $dataHeader = [];
        $dataHeader['sex'] = 'male';
        $namePlayer = "Hoàng Khắc Phúc";
        $dataHeader['Name'] = $this->collectNamePlayer($namePlayer);
        $dataHeader['Award'] = '123444';
        $data = $this->loadHeader($data,"Trang chủ", $dataHeader);
        return view('pages\guest\index', $data);
    }
}
