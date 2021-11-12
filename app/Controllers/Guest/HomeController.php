<?php
namespace App\Controllers\Guest;

use App\Controllers\BaseController;
use App\Models\guest\GuestModel;

use App\Models\guest\ModelUser;

class HomeController extends BaseController
{

    public function index()
    {
        $data = [];
        $dataHeader = array(
            'Avatar' => $this->student_data['Avatar'] == "" ? ($this->student_data['Sex'] ? 'avt-famale.jpg' : 'avt-male.jpg') : $this->student_data['Avatar'],
            'Name' => $this->getNameUser(),
            'Point' => $this->student_data['Grade'],
            'Title' => 'Trang chủ',
            'Login' => $this->student_data['User_ID'] ? true : false
        );
        $data = $this->loadHeader($data, $dataHeader);
        
        $model = model('App\Models\Guest\GuestModel');
        $data['notification'] = $model->getNotification();
        return view('pages/guest/index', $data);
    }

    public function login()
    {
        $response = array(
            "Error" => "",
        );
        if (!$this->load_Permissions())
        {
            $response['Error'] = 'Đã đăng nhập !';
            echo json_encode($response);
            return;
        }
        if (!isset($_POST['User']) || !isset($_POST['Pass']))
        {
            $response['Error'] = 'Vui lòng nhập đầy đủ thông tin !';
            echo json_encode($response);
            return;
        }
        $user = $_POST['User'];
        $pass = $_POST['Pass'];

        if ($user == "" || $user == null || $pass == "" || $pass == null)
        {
            $response['Error'] = 'Vui lòng nhập đầy đủ thông tin !';
            echo json_encode($response);
            return;
        }

        $pass = md5($pass);

        $user = strtolower($user);
        if ($this->KyTuDacBiet($user))
        {
            $response['Error'] = 'Thông tin tài khoản không chính xác !';
            echo json_encode($response);
            return;
        }

        $modelUser = new ModelUser();
        $result = $modelUser->login($user, $pass);

        if ($result)
        {
            $session = session();
            $data = array(
                'User' => $user,
                'ID' => $result,
            );
            $session->set($data);
            $response['Done'] = 'Đăng nhập thành công !';
            echo json_encode($response);
            return;
        }
        $response['Error'] = 'Thông tin tài khoản hoặc mật khẩu không chính xác !';
        echo json_encode($response);
    }

    public function logout()
    {
        if (!$this->load_Permissions(4))
            return redirect("/");
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