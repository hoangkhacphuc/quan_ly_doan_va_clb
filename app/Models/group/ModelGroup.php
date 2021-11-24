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

    public function get_post()
    {
        $query = $this->dbTable('post')->select('*')->get()->getResultArray();
        if (count($query) > 0)
        {
            for ($i=0; $i < count($query); $i++)
            {
                $data_author = $this->dbTable('student')->select('*')->where('ID', $query[$i]['Author'])->get()->getResultArray();
                $query[$i]['Author'] = $data_author[0]['Name'];
                $query[$i]['Posting'] = date('d/m/Y', strtotime($query[$i]['Posting']));
            }
            return array("status" => true, "message" => $query);
        }
        return (array('status' => false, 'message' => "<div style='width: 100%; text-align: center; margin-top: 50px'><img src='Image/empty_box.png' style='width: 200px;'></img><br><strong style='color: #777'>No data. Please reload the page !</strong></div>"));
    }

    public function change_Hide($id, $hide)
    {
        $query = $this->dbTable('post')->select('*')->where('ID', $id)->get()->getResultArray();
        if (count($query) > 0)
        {
            $this->dbTable('post')->select('*')->where('ID', $id)->update(array('Hide' => $hide));
            echo json_encode(array('status' => true, 'message' => "Đã ".($hide == 1 ? 'xuất bản' : 'ẩn').' bài viết !'));
            return;
        }
        echo json_encode(array('status' => false, 'message' => "Không tìm thấy bài viết !"));
    }

    public function delete_Post($id)
    {
        $responses = [];
        if (is_array($_POST['Hide']))
        {
            $result = $_POST['Hide'];
            foreach ($result as $key ) {
                $query = $this->dbTable('post')->select('*')->where('ID', $key)->get()->getResultArray();
                if (count($query) > 0)
                {
                    $this->dbTable('post')->where('ID', $id)->delete();
                    array_push($responses ,array('status' => true, 'message' => "Đã xóa bài viết !"));
                }
                array_push($responses ,array('status' => false, 'message' => "Không tìm thấy bài viết !"));
            }
            echo json_encode($responses);
            return;
        }
        $query = $this->dbTable('post')->select('*')->where('ID', $id)->get()->getResultArray();
        if (count($query) > 0)
        {
            $this->dbTable('post')->where('ID', $id)->delete();
            echo json_encode(array('status' => true, 'message' => "Đã xóa bài viết !"));
            return;
        }
        echo json_encode(array('status' => false, 'message' => "Không tìm thấy bài viết !"));
    }
}