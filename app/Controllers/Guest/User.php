<?php

namespace App\Controllers\Guest;

use App\Controllers\BaseController;
use App\Models\guest\ModelUser;

class User extends BaseController
{
    public $model;
    public function __construct()
    {
        $this->model = new ModelUser();
    }

    public function login()
    {
        if (!isset($_POST['User']) || !isset($_POST['Pass']))
        {
            echo "Vui lòng nhập đầy đủ thông tin !";
            return;
        }
        $user = $_POST['User'];
        $pass = $_POST['Pass'];

        if ($user == "" || $user == null || $pass == "" || $pass == null)
            return "Vui lòng nhập đầy đủ thông tin !";

        $pass = md5($pass);

        $user = strtolower($user);
        if ($this->KyTuDacBiet($user))
            return "Thông tin tài khoản không chính xác !";

        $result = $this->model->login($user, $pass);

        if ($result)
        {
            echo "Đăng nhập thành công !";
            $session = session();
            $data['User'] = $user;
            $session->set($data);
            echo $session->get('User');
        }
        else
            echo "Thông tin tài khoảng hoặc mật khẩu không chính xác !";      
    }

    public function KyTuDacBiet($str)
    {
       return preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $str);
    }
}