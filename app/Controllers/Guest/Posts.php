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
        $this->guest_model = model('App\Models\Guest\GuestModel');
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
        if (!$this->load_Permissions())
            $data = array(
                'Avatar' => $this->student_data['Avatar'] == "" ? ($this->student_data['Sex'] ? 'avt-famale.jpg' : 'avt-male.jpg') : $this->student_data['Avatar'],
                'Name' => $this->getNameUser(),
                'Point' => $this->student_data['Grade'],
                'Title' => $post['Title'],
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
        $data = array_merge($data, array(
            'Posts' => $post
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
}
?>