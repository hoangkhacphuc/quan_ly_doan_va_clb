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
        return view('pages/admin/index');
    }

}
