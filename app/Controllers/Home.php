<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [];
        $dataHeader = [];
        $dataHeader['sex'] = 'male';
        $namePlayer = "Trần Thị Lấp Lánh Ánh Sao Mai";
        $dataHeader['Name'] = $this->collectNamePlayer($namePlayer);
        $dataHeader['Point'] = '1000';
        $data = $this->loadHeader($data,"Trang chủ", $dataHeader);
        return view('pages\guest\index', $data);
    }
}
