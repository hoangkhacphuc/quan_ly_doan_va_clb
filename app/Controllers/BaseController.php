<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
    }
    
    public function loadHeader($data, $title = "", $dataHeader = [])
    {
        $data['title'] = $title;
        $data['header'] = view('templates/header', $dataHeader);
        $data['footer'] = view('templates/footer');
        return $data;
    }

    public function collectNamePlayer($name)
    {
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
}
