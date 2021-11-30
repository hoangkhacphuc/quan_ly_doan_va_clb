<?php

namespace App\Models\guest;

use App\Models\HomeModel;

class PostsModel extends HomeModel {

    public $database;
    public function __construct()
    {
        parent::__construct();
        $this->database = $this->dbTable('post');
    }

    public function getPost($id)
    {
        return $this->database->select('*')->where('ID', $id)->get()->getResultArray();
    }

    public function getJoinEvent($id, $post)
    {
        return $this->dbTable('event_member')->select('*')->where(array('Member' => $id, 'Posts' => $post))->get()->getResultArray();
    }

    public function joinEvent($id, $posts, $position)
    {
        $query = $this->dbTable('post')->select('*')->where('ID', $posts)->get()->getResultArray();
        if (empty($query) || count($query) == 0 || $query[0]['Hide'] == 0)
        {
            echo json_encode(array('status' => false, 'message' => "Không tìm thấy bài viết !"));
            return;
        }
        $onJoin = (date('Y-m-d') >= $query[0]['Start']) && (date('Y-m-d') <= $query[0]['End']);
        if (!$onJoin)
        {
            echo json_encode(array('status' => false, 'message' => "Đã hết thời gian tham gia sự kiện !"));
            return;
        }
        $sl = explode('|', $query[0]['SelectPosition']);
        if (intval($sl[$position - 1]) == 0)
        {
            echo json_encode(array('status' => false, 'message' => "Sự kiện không có chức vụ này !"));
            return;
        }
        $query = $this->dbTable('event_member')->select('*')->where(array(
            'Member' => $id,
            'Posts' => $posts
        ))->get()->getResultArray();
        if (!empty($query) && count($query) > 0)
        {
            $query = $this->dbTable('event_member')->where(array(
                'Member' => $id,
                'Posts' => $posts
            ))->delete();
        }
        $query = $this->dbTable('event_member')->insert(array(
            'Member' => $id,
            'Position' => $position,
            'Posts' => $posts
        ));

        echo $query ? json_encode(array('status' => true, "message" => "Đăng ký tham gia thành công !")) : json_encode(array('status' => false, "message" => "Đăng ký tham gia thất bại !"));
    }

    public function cancelEvent($id, $posts)
    {
        
        $query = $this->dbTable('post')->select('*')->where('ID', $posts)->get()->getResultArray();
        if (empty($query) || count($query) == 0 || $query[0]['Hide'] == 0)
        {
            echo json_encode(array('status' => false, 'message' => "Không tìm thấy bài viết !"));
            return;
        }
        $onJoin = (date('Y-m-d') >= $query[0]['Start']) && (date('Y-m-d') <= $query[0]['End']);
        if (!$onJoin)
        {
            echo json_encode(array('status' => false, 'message' => "Đã hết thời gian tham gia sự kiện !"));
            return;
        }
        $query = $this->dbTable('event_member')->where(array(
            'Member' => $id,
            'Posts' => $posts
        ))->delete();

        echo $query ? json_encode(array('status' => true, "message" => "Đã hủy tham gia !")) : json_encode(array('status' => false, "message" => "Hủy tham gia thất bại !"));
    }
}
