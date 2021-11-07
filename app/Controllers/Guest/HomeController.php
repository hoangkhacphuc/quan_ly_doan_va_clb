<?php
namespace App\Controllers\Guest;

use App\Controllers\BaseController;
use App\Models\guest\GuestModel;

use App\Models\guest\ModelUser;

class HomeController extends BaseController
{

    public function index()
    {
        $session = session();
        $user = $session->get('User');
        $model = new GuestModel();
        $dataUser = $model->getInfo($session->get('ID'))[0];
        $data = [];
        $dataHeader = array(
            'Avatar' => $dataUser['Avatar'] == "" ? ($dataUser['Sex'] ? 'avt-famale.jpg' : 'avt-male.jpg') : $dataUser['Avatar'],
            'Name' => $this->collectNamePlayer($dataUser['Name']),
            'Point' => $dataUser['Grade'],
            'Title' => 'Trang chủ',
            'Login' => $session->get('ID') ? true : false
        );
        $data = $this->loadHeader($data, $dataHeader);
        
        $data['notification'] = $model->getNotification();
        return view('pages\guest\index', $data);
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

        $modelUser = new ModelUser();
        $result = $modelUser->login($user, $pass);

        if ($result)
        {
            echo "Đăng nhập thành công !";
            $session = session();
            $data = array(
                'User' => $user,
                'ID' => $result,
            );
            $session->set($data);
        }
        else
            echo "Thông tin tài khoản hoặc mật khẩu không chính xác !";
            
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect("/");
    }

    public function KyTuDacBiet($str)
    {
       return preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $str);
    }
}

?>