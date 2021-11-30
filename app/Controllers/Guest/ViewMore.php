<?php
namespace App\Controllers\Guest;

use App\Controllers\BaseController;

class ViewMore extends BaseController
{
    public $guest_model;
    public $viewmore_model;
    public function __construct()
    {
        $this->guest_model = model('App\Models\guest\GuestModel');
        $this->viewmore_model = model('App\Models\guest\ViewMoreModel');
    }

    public function viewPosts()
    {
        $limit = 0;
        if (isset($_GET['Limit']))
            $limit = $_GET['Limit'];

        if (!$this->load_Permissions())
            $dataHeader = array(
                'Avatar' => $this->student_data['Avatar'] == "" ? ($this->student_data['Sex'] ? 'avt-famale.jpg' : 'avt-male.jpg') : $this->student_data['Avatar'],
                'Name' => $this->getNameUser(),
                'Point' => $this->student_data['Grade'],
                'Title' => 'Bài đăng',
                'Login' => $this->student_data['User_ID'] ? true : false,
                'Banner' => $this->guest_model->getBanner()
            );
        else 
            $dataHeader = array(
                'Title' => 'Bài đăng',
                'Login' => false,
                'Banner' => $this->guest_model->getBanner()
            );

        $data = [];
        $data = $this->loadHeader($data, $dataHeader);
        $data = array_merge($data, array(
            'Posts' => $this->viewmore_model->viewPosts($limit),
            'Count' => $this->viewmore_model->getCountPosts(),
            'Current' => $limit
        ));

        if ($limit*10 > $data['Count'])
        {
            $this->loadEmptyPost();
            return;
        }

        return view('pages/guest/ViewMore', $data);
    }

    public function viewEvent()
    {
        $limit = 0;
        if (isset($_GET['Limit']))
            $limit = $_GET['Limit'];

        if (!$this->load_Permissions())
            $dataHeader = array(
                'Avatar' => $this->student_data['Avatar'] == "" ? ($this->student_data['Sex'] ? 'avt-famale.jpg' : 'avt-male.jpg') : $this->student_data['Avatar'],
                'Name' => $this->getNameUser(),
                'Point' => $this->student_data['Grade'],
                'Title' => 'Bài đăng',
                'Login' => $this->student_data['User_ID'] ? true : false,
                'Banner' => $this->guest_model->getBanner()
            );
        else 
            $dataHeader = array(
                'Title' => 'Bài đăng',
                'Login' => false,
                'Banner' => $this->guest_model->getBanner()
            );

        $data = [];
        $data = $this->loadHeader($data, $dataHeader);
        $type = 0;
        if (isset($_GET['Status']))
        {
            if ($_GET['Status'] == 'late')
                $type = 2;
            else if ($_GET['Status'] == 'now')
                $type = 1;
        }
        $data = array_merge($data, array(
            'Posts' => $type == 0 ? $this->viewmore_model->viewEvent($limit) : ($type == 1 ? $this->viewmore_model->viewEventHappening($limit) : $this->viewmore_model->viewEventTookPlace($limit)),
            'Count' => $type == 0 ? $this->viewmore_model->getCountEvent() : ($type == 1 ? $this->viewmore_model->getCountEventHappening() : $this->viewmore_model->getCountEventTookPlace()),
            'Current' => $limit,
            'Status' => $type
        ));

        if ($limit*10 > $data['Count'])
        {
            $this->loadEmptyPost();
            return;
        }

        return view('pages/guest/MoreEvent', $data);
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