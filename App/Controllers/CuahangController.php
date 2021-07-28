<?php

namespace App\Controllers;
use App\Models\cuaHangModel;
use App\Models\danhMucModel;
use App\Models\monanModel;
use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class CuahangController extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $getCuahang = cuaHangModel::getAll();
        $danhMuc = danhMucModel::getAll();
        View::render('Client/index.php', ['page'=>'CuaHang', 'listCuaHang'=>$getCuahang,'DanhMuc'=>$danhMuc]);
    }
    public function monAnOfCuaHangAction(){
        $danhMuc = danhMucModel::getAll();
        $params = $this -> route_params;
        if (isset($params['idmon']))
        {
            $idMonAn = $params['idmon'];
            $MonAnOfCuaHang = monanModel::getMonAnOfCuaHang($idMonAn);
            //var_dump($MonAnOfCuaHang); die();
            View::render('Client/index.php', ['page'=>'CuaHangDetail','DanhMuc'=>$danhMuc, 'MonAnCuaHang'=>$MonAnOfCuaHang]);
        }
          
    }
    public function MonAnByIdCuaHangAction(){
        $danhMuc = danhMucModel::getAll();
        $params = $this -> route_params;
        if (isset($params['idcuahang']))
        {
            $idcuahang = $params['idcuahang'];
            $MonAnOfCuaHangByIDCuaHang = monanModel::getMonAnOfCuaHangByIDCuaHang($idcuahang);
            //var_dump($MonAnOfCuaHangByIDCuaHang); die();
            View::render('Client/index.php', ['page'=>'CuaHangDetail','DanhMuc'=>$danhMuc, 'MonAnCuaHang'=>$MonAnOfCuaHangByIDCuaHang]);
        }
    }
}
