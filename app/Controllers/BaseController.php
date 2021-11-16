<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class BaseController extends Controller
{
    protected $request;
    protected $helpers = [];
    public $home_model;
    public $student_data;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $session = session();
        if ($session->get('User') != "" && $session->get('User') != null)
        {
            $this->home_model = model('App\Models\HomeModel');
            $this->student_data = $this->home_model->get_data_user();
        }
    }
    
    public function loadHeader($data, $dataHeader)
    {
        $data['header'] = view('templates/header', $dataHeader);
        $data['footer'] = view('templates/footer');
        return $data;
    }

    public function getNameUser()
    {
        $name = $this->student_data['Name'];
        if (strlen($name) <= 20)
            return $name;
        
        $arr_name = explode(" ", $name);
        $result = $arr_name[0]." ";
        
        for ($i=1; $i < count($arr_name)-1; $i++)
        {
            $first_charz = $arr_name[$i][0];
            $current = "";
            if (!ctype_alnum($first_charz))
            {
                for ($j=0; $j < strlen($arr_name[$i]); $j++)
                    if (!ctype_alnum($arr_name[$i][$j]))
                        $current =  $current . $arr_name[$i][$j];
                    else break;
                $first_charz = $current;
            }
            $result .= $first_charz.($i == count($arr_name)-2 ? " ":".");
        }
        $result .= $arr_name[count($arr_name)-1];
        return $result;
    }

    public function load_Permissions($param = '')
    {
        $session = session();
        $User = $session->get('User');
        
        if (empty($param) || !$param) // Đăng nhập không được vào
        {
            if (!empty($User))
                return false;
            return true;
        }
        if (empty($User) || $User == NULL) // Chưa đăng nhập ko được vào
        {
            return false;
        }

        $this->home_model = model('App\Models\HomeModel');
        $this->student_data = $this->home_model->get_data_user();
        if ($param == 1  && $this->student_data['Position'] != "Super Admin")  // Super Admin được vào
        {
            return false;
        }
        if ($param == 2 && $User != "" && $this->student_data['Position'] != "Quản Lý Đoàn" &&  $this->student_data['Position'] != "Super Admin")  // Super Admin & quản lý đoàn được vào
        {
            return false;
        }
        if ($param == 3 && $User != "" && $this->student_data['Position'] != "Quản Lý Câu Lạc Bộ")  // Quản lý CLB được vào
        {
            return false;
        }
        return true;
    }
}
