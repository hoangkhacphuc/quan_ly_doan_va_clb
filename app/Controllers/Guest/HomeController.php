<?php
namespace App\Controllers\Guest;

use App\Controllers\BaseController;
use App\Models\guest\GuestModel;

class HomeController extends BaseController
    {
        public function index()
        {
            $data = [];
            $dataHeader = array(
                'sex' => 'male',
                'Name' => $this->collectNamePlayer('Hoàng Khắc Phúc'),
                'Point' => '1234',
                'Title' => 'Trang chủ',
            );
            $data = $this->loadHeader($data, $dataHeader);
            $model = new GuestModel();
            $data['notification'] = $model->getNotification();
            return view('pages\guest\index', $data);
        }
    }

?>