<?php
    namespace App\Controllers\Group;
    use App\Controllers\BaseController;

    class Group extends BaseController
    {
        public function index()
        {
            if (!$this->load_Permissions(2))
                return redirect("/");
            $data = array(
                'Title' => 'Quản Lý Đoàn - Dashboard',

            );
            return view('pages/group/index', $data);
        }

        public function new_post()
        {
            if (!$this->load_Permissions(1))
                return redirect("/");
            return view('pages/group/new_post');
        }
    }

?>