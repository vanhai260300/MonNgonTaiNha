<?php

namespace App\Controllers;
use App\Models\cuaHangModel;
use App\Models\danhMucModel;
use App\Models\monanModel;
use App\Models\hoaDonModel;
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
        View::render('Client/index.php', ['page'=>'CuaHang', 'title'=>"Cửa Hàng", 'listCuaHang'=>$getCuahang,'DanhMuc'=>$danhMuc]);
    }
    public function monAnOfCuaHangAction(){
        $danhMuc = danhMucModel::getAll();
        $params = $this -> route_params;
        if (isset($params['idmon']))
        {
            if (!isset($_SESSION['id-client']))
            {
                header("location:/DoAn1/public/dang-nhap");
            }  else {
                $idMonAn = $params['idmon'];
            $MonAnOfCuaHang = monanModel::getMonAnOfCuaHang($idMonAn);
            $gioHang = hoaDonModel::getChiTietHoaDonAll();
            // var_dump($gioHang); die();
            View::render('Client/index.php', ['page'=>'CuaHangDetail', 'title'=>"Cửa Hàng",'DanhMuc'=>$danhMuc, 'MonAnCuaHang'=>$MonAnOfCuaHang,'gioHang'=>$gioHang]);
        
            }
            }
          
    }
    public function MonAnByIdCuaHangAction(){
        $danhMuc = danhMucModel::getAll();
        $params = $this -> route_params;
        if (isset($params['idcuahang']))
        {
            if (!isset($_SESSION['id-client']))
            {
                header("location:/DoAn1/public/dang-nhap");
            } else {
                $idcuahang = $params['idcuahang'];
                $MonAnOfCuaHangByIDCuaHang = monanModel::getMonAnOfCuaHangByIDCuaHang($idcuahang);
                $gioHang = hoaDonModel::getChiTietHoaDonAll();
                // var_dump($gioHang); die();
                View::render('Client/index.php', ['page'=>'CuaHangDetail', 'title'=>"Cửa Hàng",'DanhMuc'=>$danhMuc, 'MonAnCuaHang'=>$MonAnOfCuaHangByIDCuaHang,'gioHang'=>$gioHang]);
            }
            
        }
    }
}
