<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\admin\ModelNotification;

class Post extends BaseController{
    public $model;
    public function __construct()
    {
        $this->model = new ModelPost();
    }
    public function add()
    {
        if (!isset($_POST['Title']) && !isset($_POST['Content']) && !isset($_POST['Author']) && !isset($_POST['Posting']) && !isset($_POST['Type']) && !isset($_POST['Hide']) && !isset($_POST['Image']) && !isset($_POST['Privacy']))
        {
            echo "Thêm thất bại !";
            return;
        }
        $title = $_POST['Title'];
        $content = $_POST['Content'];
        $author = $_POST['Author'];
        $posting = $_POST['Posting'];
        $type = $_POST['Type'];
        $hide = $_POST['Hide'];
        $image = $_POST['Image'];
        $privacy = $_POST['Privacy'];

        $this->model->add($title, $content, $author, $posting, $type, $hide, $image, $privacy);
    }
    public function update()
    {
        if (!isset($_POST['ID']) && !isset($_POST['Title']) && !isset($_POST['Content']) && !isset($_POST['Author']) && !isset($_POST['Posting']) && !isset($_POST['Type']) && !isset($_POST['Hide']) && !isset($_POST['Image']) && !isset($_POST['Privacy']))
        {
            echo "Cập nhật thất bại !";
            return;
        }
        $ID = $_POST['ID'];
        $title = $_POST['Title'];
        $content = $_POST['Content'];
        $author = $_POST['Author'];
        $posting = $_POST['Posting'];
        $type = $_POST['Type'];
        $hide = $_POST['Hide'];
        $image = $_POST['Image'];
        $privacy = $_POST['Privacy'];

        $this->model->update($ID, $title, $content, $author, $posting, $type, $hide, $image, $privacy);
    }
    public function delete()
    {
        if (!isset($_POST['ID']))
        {
            echo "Xóa thất bại !";
            return;
        }
        $ID = $_POST['ID'];
        $this->model->delete($ID);
    }
}