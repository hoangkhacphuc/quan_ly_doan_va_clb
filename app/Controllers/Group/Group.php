<?php
namespace App\Controllers\Group;
use App\Controllers\BaseController;

class Group extends BaseController
{
    public $group_model;
    public $lienchidoan_model;
    public function __construct()
    {
        $this->group_model = model('App\Models\group\ModelGroup');
        $this->lienchidoan_model = model('App\Models\admin\ModelLienChiDoan');
    }

    public function index()
    {
        if (!$this->load_Permissions(2))
            return redirect("/");
        $data = array(
            'Title' => 'Quản Lý Đoàn - Dashboard',

        );
        return view('pages/group/index', $data);
    }

    public function new_post()
    {
        if (!$this->load_Permissions(1))
        {
            echo "<div style='width: 100%; text-align: center; margin-top: 50px'><img src='Image/empty_box.png' style='width: 200px;'></img><br><strong style='color: #777'>No data. Please reload the page !</strong></div>";
            return;
        }
        return view('pages/group/new_post');
    }

    public function edit_post()
    {
        if (!$this->load_Permissions(1))
        {
            echo "<div style='width: 100%; text-align: center; margin-top: 50px'><img src='Image/empty_box.png' style='width: 200px;'></img><br><strong style='color: #777'>No data. Please reload the page !</strong></div>";
            return;
        }
        if (!isset($_GET['ID']))
        {
            echo "<div style='width: 100%; text-align: center; margin-top: 50px'><img src='Image/empty_box.png' style='width: 200px;'></img><br><strong style='color: #777'>No data. Please reload the page !</strong></div>";
            return;
        }
        $data = array(
            'List_Post' => $this->group_model->get_post_ID($_GET['ID']),

        );
        return view('pages/group/edit_post', $data);
    }

    public function home()
    {
        if (!$this->load_Permissions(1))
        {
            echo "<div style='width: 100%; text-align: center; margin-top: 50px'><img src='Image/empty_box.png' style='width: 200px;'></img><br><strong style='color: #777'>No data. Please reload the page !</strong></div>";
            return;
        }

        $data = array(
            'List_Post' => $this->group_model->get_post(),
        );
        return view('pages/group/home', $data);
    }

    public function lienchidoan()
    {
        if (!$this->load_Permissions(1))
        {
            echo "<div style='width: 100%; text-align: center; margin-top: 50px'><img src='Image/empty_box.png' style='width: 200px;'></img><br><strong style='color: #777'>No data. Please reload the page !</strong></div>";
            return;
        }

        $data = array(
            'LienChiDoan' => $this->lienchidoan_model->getLCD(),

        );
        return view('pages/group/lienchidoan', $data);
    }

    public function create_Post()
    {
        if (!$this->load_Permissions(2))
        {
            echo json_encode(array("status" => false, "message" => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['title']))
        {
            echo json_encode(array("status" => false, "message" => "Chưa có tiêu đề !"));
            return;
        }
        if (!isset($_POST['content']))
        {
            echo json_encode(array("status" => false, "message" => "Chưa có nội dung bài đăng !"));
            return;
        }
        if (!isset($_POST['type']))
        {
            echo json_encode(array("status" => false, "message" => "Chưa chọn thể loại bài đăng !"));
            return;
        }
        if (!isset($_POST['show']))
        {
            echo json_encode(array("status" => false, "message" => "Chưa chọn chế độ hiển thị !"));
            return;
        }
        if (!isset($_FILES['file']['name']) || empty($_FILES['file']['name']))
        {
            echo json_encode(array("status" => false, "message" => "Không có ảnh đại diện !"));
            return;
        }
        if (intval($_FILES['file']['size']) > 10485760)
        {
            echo json_encode(array("status" => false, "message" => "Kích thước ảnh đại diện quá lớn. Vui lòng chọn file nhỏ hơn 10MB !"));
            return;
        }
        $location = $_FILES['file']['name'];
        $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
        $imageFileType = strtolower($imageFileType);
        
        $name = $this->randomString().".".strtolower($imageFileType);

        while(file_exists($name))
        {
            $name = $this->randomString().".".strtolower($imageFileType);
        }
        $valid = array("jpg","jpeg","png");

        if (in_array(strtolower($imageFileType), $valid))
        {
            if(move_uploaded_file($_FILES['file']['tmp_name'],'Image/Upload/'.$name)){
                $title = $_POST['title'];
                $url_Avatar = "Image/Upload/".$name;
                if (!in_array(intval($_POST['type']), [0,1]) || !in_array(intval($_POST['show']), [0,1]) || !in_array(intval($_POST['cb1']), [0,1]) || !in_array(intval($_POST['cb2']), [0,1]) || !in_array(intval($_POST['cb3']), [0,1]))
                {
                    echo json_encode(array("status" => false, "message" => "Giá trị truyền vào sai !"));
                    return;
                }
                
                $type_Post = $_POST['type'];
                $show = $_POST['show'];
                $cv1 = isset($_POST['cv1']) ? $_POST['cv1'] : 0;
                $cv2 = isset($_POST['cv2']) ? $_POST['cv2'] : 0;
                $cv3 = isset($_POST['cv3']) ? $_POST['cv3'] : 0;
                $gh1 = isset($_POST['gh1']) ? $_POST['gh1'] : 0;
                $gh2 = isset($_POST['gh2']) ? $_POST['gh2'] : 0;
                $gh3 = isset($_POST['gh3']) ? $_POST['gh3'] : 0;
                $cb1 = isset($_POST['cb1']) ? $_POST['cb1'] : 0;
                $cb2 = isset($_POST['cb2']) ? $_POST['cb2'] : 0;
                $cb3 = isset($_POST['cb3']) ? $_POST['cb3'] : 0;
                $content = $_POST['content'];
                $this->group_model->create_Post($title, $content, $url_Avatar, $type_Post, $cv1, $cv2, $cv3, $gh1, $gh2, $gh3, $cb1, $cb2, $cb3, $show);
                return;
            }
            echo json_encode(array("status" => false, "message" => "Xảy ra lỗi trong quá trình lưu file. Vui lòng thử lại !"));
            return;
        }
        echo json_encode(array("status" => false, "message" => "File tải lên không phải ảnh !"));
    }

    public function save_Edit_Post()
    {
        if (!$this->load_Permissions(2))
        {
            echo json_encode(array("status" => false, "message" => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['ID']))
        {
            echo json_encode(array("status" => false, "message" => "Chưa có ID bài viết !"));
            return;
        }
        if (!isset($_POST['title']))
        {
            echo json_encode(array("status" => false, "message" => "Chưa có tiêu đề !"));
            return;
        }
        if (!isset($_POST['content']))
        {
            echo json_encode(array("status" => false, "message" => "Chưa có nội dung bài đăng !"));
            return;
        }
        if (!isset($_POST['type']))
        {
            echo json_encode(array("status" => false, "message" => "Chưa chọn thể loại bài đăng !"));
            return;
        }
        if (!isset($_POST['show']))
        {
            echo json_encode(array("status" => false, "message" => "Chưa chọn chế độ hiển thị !"));
            return;
        }
        
        if ((isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])) && intval($_FILES['file']['size']) > 10485760)
        {
            echo json_encode(array("status" => false, "message" => "Kích thước ảnh đại diện quá lớn. Vui lòng chọn file nhỏ hơn 10MB !"));
            return;
        }

        $url_Avatar = '';

        if (isset($_FILES['file']['name']) && !empty($_FILES['file']['name']))
        {
            $location = $_FILES['file']['name'];
            $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);
            
            $name = $this->randomString().".".strtolower($imageFileType);

            while(file_exists($name))
            {
                $name = $this->randomString().".".strtolower($imageFileType);
            }
            $valid = array("jpg","jpeg","png");
            if (in_array(strtolower($imageFileType), $valid))
            {
                if(!move_uploaded_file($_FILES['file']['tmp_name'],'Image/Upload/'.$name)){
                    echo json_encode(array("status" => false, "message" => "Xảy ra lỗi trong quá trình lưu file. Vui lòng thử lại !"));
                    return;
                }
            }
            else {
                echo json_encode(array("status" => false, "message" => "File tải lên không phải ảnh !"));
                return;
            }
            $url_Avatar = "Image/Upload/".$name;
        }

        
        $title = $_POST['title'];
        
        if (!in_array(intval($_POST['type']), [0,1]) || !in_array(intval($_POST['show']), [0,1]) || !in_array(intval($_POST['cb1']), [0,1]) || !in_array(intval($_POST['cb2']), [0,1]) || !in_array(intval($_POST['cb3']), [0,1]))
        {
            echo json_encode(array("status" => false, "message" => "Giá trị truyền vào sai !"));
            return;
        }
        
        $type_Post = $_POST['type'];
        $show = $_POST['show'];
        $cv1 = isset($_POST['cv1']) ? $_POST['cv1'] : 0;
        $cv2 = isset($_POST['cv2']) ? $_POST['cv2'] : 0;
        $cv3 = isset($_POST['cv3']) ? $_POST['cv3'] : 0;
        $gh1 = isset($_POST['gh1']) ? $_POST['gh1'] : 0;
        $gh2 = isset($_POST['gh2']) ? $_POST['gh2'] : 0;
        $gh3 = isset($_POST['gh3']) ? $_POST['gh3'] : 0;
        $cb1 = isset($_POST['cb1']) ? $_POST['cb1'] : 0;
        $cb2 = isset($_POST['cb2']) ? $_POST['cb2'] : 0;
        $cb3 = isset($_POST['cb3']) ? $_POST['cb3'] : 0;
        $content = $_POST['content'];
        $this->group_model->save_Edit_Post($_POST['ID'], $title, $content, $url_Avatar, $type_Post, $cv1, $cv2, $cv3, $gh1, $gh2, $gh3, $cb1, $cb2, $cb3, $show);
        return;
    }


    public function change_Hide_Post()
    {
        if (!$this->load_Permissions(2))
        {
            echo json_encode(array('status' => false, 'message' => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['ID']) || !isset($_POST['Hide']) )
        {
            echo json_encode(array('status' => false, 'message' => "Thông tin cung cấp không đủ !"));
            return;
        }
        $this->group_model->change_Hide($_POST['ID'], $_POST['Hide']);
    }

    public function delete_Post()
    {
        if (!$this->load_Permissions(2))
        {
            echo json_encode(array('status' => false, 'message' => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['ID']))
        {
            echo json_encode(array('status' => false, 'message' => "Thông tin cung cấp không đủ !"));
            return;
        }
        if (intval($_POST['ID']) == -1 && !isset($_POST['Delete']))
        {
            echo json_encode(array('status' => false, 'message' => "Thông tin cung cấp không đủ !"));
            return;
        }
        $delete = isset($_POST['Delete']) ? $_POST['Delete'] : false;
        
        $this->group_model->delete_Post($_POST['ID'], $delete);
    }
}

?>