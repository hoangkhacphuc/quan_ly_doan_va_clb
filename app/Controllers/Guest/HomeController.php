<?php
namespace App\Controllers\Guest;

use App\Controllers\BaseController;
use App\Models\guest\GuestModel;

use App\Models\guest\ModelUser;

class HomeController extends BaseController
{

    public function index()
    {
        $model = model('App\Models\Guest\GuestModel');
        $data = [];
        if (!$this->load_Permissions())
            $dataHeader = array(
                'Avatar' => $this->student_data['Avatar'] == "" ? ($this->student_data['Sex'] ? 'avt-famale.jpg' : 'avt-male.jpg') : $this->student_data['Avatar'],
                'Name' => $this->getNameUser(),
                'Point' => $this->student_data['Grade'],
                'Title' => 'Trang chủ',
                'Login' => $this->student_data['User_ID'] ? true : false,
                'Banner' => $model->getBanner()
            );
        else 
            $dataHeader = array(
                'Title' => 'Trang chủ',
                'Login' => false,
                'Banner' => $model->getBanner()
            );
        $data = $this->loadHeader($data, $dataHeader);
        
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

    public function upload_banner()
    {
        if (!$this->load_Permissions(4))
        {
            echo json_encode(array("Error" => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_FILES['file']['name']) || empty($_FILES['file']['name']))
        {
            echo json_encode(array("Error" => "Không có dữ liệu !"));
            return;
        }
        if (intval($_FILES['file']['size']) > 10485760)
        {
            echo json_encode(array("Error" => "Kích thước file quá lớn. Vui lòng chọn file nhỏ hơn 10MB !"));
            return;
        }
        $location = $_FILES['file']['name'];
        $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
        $imageFileType = strtolower($imageFileType);
        
        $valid = array("jpg","jpeg","png");

        if (in_array(strtolower($imageFileType), $valid))
        {
            $model = model('App\Models\Guest\GuestModel');
            $name = 'img'.(count($model->getBanner())+1).".".strtolower($imageFileType);
            if(move_uploaded_file($_FILES['file']['tmp_name'],'Image/Banner/'.$name)){
                $model->upload_banner($name);
                return;
            }
            echo json_encode(array("Error" => "Xảy ra lỗi trong quá trình lưu file. Vui lòng thử lại !"));
            return;
        }
        echo json_encode(array("Error" => "File tải lên không phải ảnh !"));
    }

    public function KyTuDacBiet($str)
    {
       return preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $str);
    }
}

?>