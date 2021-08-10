<?php

namespace App\Controllers;

use App\Models\monanModel;
use App\Models\danhMucModel;
use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class MonAnController extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $params = $this->route_params;
        $tenMon = "";
        //var_dump($params); die();
        if (empty($params['id']))
            $params['id'] = 1;
        if (isset($_POST['searchString']))
        {
            $tenMon = $_POST['searchTenMon'];
            
        }
        
        $MonAnInPage = monanModel::getMonAnPagi($params['id'],$tenMon);
        $danhMuc = danhMucModel::getAll();
        View::render('Client/index.php', ['page' => 'monan', 'title'=>"Danh Sách Món Ăn", 'MonAnInPage' => $MonAnInPage, 'DanhMuc' => $danhMuc,'TuTimKiem'=>$tenMon]);
    }
    public function LoaiMonAction()
    {
        $params = $this->route_params;
        //var_dump($params); die();
        if (isset($params['idcate']))
            $idDanhMuc = $params['idcate'];
        if (empty($params['id']))
            $params['id'] = 1;
        $MonAnInPage = monanModel::getMonAnTheoDMPagi($params['id'],$idDanhMuc);
        $danhMuc = danhMucModel::getAll();
        View::render('Client/index.php', ['page' => 'monan', 'title'=>"Loại món", 'MonAnInPage' => $MonAnInPage, 'DanhMuc' => $danhMuc,'MaDanhMuc'=>$idDanhMuc]);
    }
}
