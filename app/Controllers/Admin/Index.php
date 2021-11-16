<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Index extends BaseController
{
    public $model_index;
    public function __construct()
    {
        $this->model_index = model('App\Models\admin\ModelIndex');
    }

    public function index()
    {
        if (!$this->load_Permissions(1))
            return redirect("/");

        
        $data = array(
            'Title' => "Super Admin - Dashboard",
        );
        return view('pages/admin/index', $data);
    }

    public function home()
    {
        if (!$this->load_Permissions(1))
            return redirect("/");
        $model = model('App\Models\Guest\GuestModel');
        $data = array(
            'Banner' => $model->getBanner(),
            'notification' => $this->model_index->getNotification()
        );
        return view('pages/admin/home', $data);
    }

    public function banner_delete()
    {
        if (!$this->load_Permissions(2))
        {
            echo json_encode(array("Error" => "Không đủ quyền truy cập !"));
            return;
        }
        if (!isset($_POST['Image']) || empty($_POST['Image']))
        {
            echo json_encode(array("Error" => "Không có dữ liệu !"));
            return;
        }
        $this->model_index->banner_delete($_POST['Image']);
    }

}
