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

}
