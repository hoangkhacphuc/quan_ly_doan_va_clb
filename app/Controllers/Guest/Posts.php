<?php
namespace App\Controllers\Guest;

use App\Controllers\BaseController;


class Posts extends BaseController
{
    public $post_model;
    public $guest_model;
    public function __construct()
    {
        $this->post_model = model('App\Models\guest\PostsModel');
        $this->guest_model = model('App\Models\guest\GuestModel');
    }

    public function index()
    {
        if (!isset($_GET['ID']))
        {
            $this->loadEmptyPost();
            return;
        }

        $post = $this->post_model->getPost($_GET['ID']);
        if (empty($post) || count($post) == 0)
        {
            $this->loadEmptyPost();
            return;
        }
        $post = $post[0];
        if ($post['Hide'] == 0)
        {
            $this->loadEmptyPost();
            return;
        }
        if (!$this->load_Permissions())
        {
            $data = array(
                'Avatar' => $this->student_data['Avatar'] == "" ? ($this->student_data['Sex'] ? 'avt-famale.jpg' : 'avt-male.jpg') : $this->student_data['Avatar'],
                'Name' => $this->getNameUser(),
                'Point' => $this->student_data['Grade'],
                'Title' => $post['Title'],
                'Login' => $this->student_data['User_ID'] ? true : false,
                'Banner' => $this->guest_model->getBanner(),
                'Join' => $this->post_model->getJoinEvent($this->student_data['User_ID'], $_GET['ID']),
            );
        }
        else
            $data = array(
                'Title' => $post['Title'],
                'Login' => false,
                'Banner' => $this->guest_model->getBanner()
            );
        $data = $this->loadHeader($data, $data);
        $data = array_merge($data, array(
            'Posts' => $post,
            'New_Posts' => $this->guest_model->getPosts(),
            'New_Event' => $this->guest_model->getPosts(1),
        ));
        return view('pages/guest/post', $data);
    }

    public function loadEmptyPost()
    {
        if (!$this->load_Permissions())
            $data = array(
                'Avatar' => $this->student_data['Avatar'] == "" ? ($this->student_data['Sex'] ? 'avt-famale.jpg' : 'avt-male.jpg') : $this->student_data['Avatar'],
                'Name' => $this->getNameUser(),
                'Point' => $this->student_data['Grade'],
                'Title' => 'Không tìm thấy bài viết',
                'Login' => $this->student_data['User_ID'] ? true : false,
                'Banner' => $this->guest_model->getBanner()
            );
        else
            $data = array(
                'Title' => 'Không tìm thấy bài viết',
                'Login' => false,
                'Banner' => $this->guest_model->getBanner()
            );
        $data = $this->loadHeader($data, $data);
        echo view('pages/guest/empty-post', $data);
    }

    public function joinEvent()
    {
        if (!isset($_POST['Posts']) || !isset($_POST['Position']))
        {
            echo json_encode(array('status' => false, 'message' => "Chưa đủ thông tin !"));
            return;
        }
        if (!in_array(intval($_POST['Position']), [1, 2, 3]))
        {
            echo json_encode(array('status' => false, 'message' => "Thông tin cung cấp không đúng định dạng !"));
            return;
        }
        if ($this->load_Permissions())
        {
            echo json_encode(array('status' => false, 'message' => "Vui lòng đăng nhập và thực hiện lại !"));
            return;
        }

        $this->post_model->joinEvent($this->student_data['User_ID'], $_POST['Posts'], $_POST['Position']);
    }

    public function cancelEvent()
    {
        if (!isset($_POST['Posts']))
        {
            echo json_encode(array('status' => false, 'message' => "Chưa đủ thông tin !"));
            return;
        }
        if ($this->load_Permissions())
        {
            echo json_encode(array('status' => false, 'message' => "Vui lòng đăng nhập và thực hiện lại !"));
            return;
        }

        $this->post_model->cancelEvent($this->student_data['User_ID'], $_POST['Posts']);
    }
}
?>