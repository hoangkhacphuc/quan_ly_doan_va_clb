<?php

namespace App\Models\group;

use App\Models\HomeModel;

class ModelGroup extends HomeModel {
    public function __construct()
    {
        parent::__construct();
    }

    public function create_Post($title, $content, $avatar, $type, $cv1, $cv2, $cv3, $gh1, $gh2, $gh3, $cb1, $cb2, $cb3, $show)
    {
        $cv = $cv1."|".$cv2."|".$cv3;
        $gh = $gh1."|".$gh2."|".$gh3;
        $cb = $cb1."|".$cb2."|".$cb3;
        $data = array(
            'Title' => $title,
            'Content' => $content,
            'Author' => $this->student_data['User_ID'],
            'Posting' => date('Y-m-d'),
            'Type' => $type,
            'Hide' => $show,
            'Image' => $avatar,
            'Position' => $cv,
            'MaxPlayer' => $gh,
            'SelectPosition' => $cb,
        );

        $query = $this->dbTable('post')->insert($data);
        echo $query ? json_encode(array("status" => true, "message" => "Thêm thành công !")) : json_encode(array("status" => false, 'message' => "Thêm thất bại !"));
    }

    public function get_post($limit, $type = null)
    {
        $query = "";
        if ($type != null)
            $query = $this->dbTable('post')->select('*')->join('student', 'post.Author = student.ID')->where('Hide', $type)->limit(intval($limit)*20, intval($limit+1)*20)->get()->getResultArray();
        else
            $query = $this->dbTable('post')->select('*')->limit(intval($limit)*20, intval($limit+1)*20)->get()->getResultArray();
        if (count($query) > 0)
        {
            echo json_encode(array("status" => true, "message" => json_encode($query)));
            return;
        }
        echo json_encode(array('status' => false, 'message' => "<div style='width: 100%; text-align: center; margin-top: 50px'><img src='Image/empty_box.png' style='width: 200px;'></img><br><strong style='color: #777'>No data. Please reload the page !</strong></div>"));
    }
}