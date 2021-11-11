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
        $data = array(
            'Title' => "Super Admin - Dashboard",
            'Avatar' => $this->student_data['Avatar'],

        );
        return view('pages/admin/index', $data);
    }

    public function home()
    {
        return view('pages/admin/home');
    }

}
