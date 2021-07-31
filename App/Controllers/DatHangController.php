<?php

namespace App\Controllers;

use App\Models\monanModel;
use App\Models\hoaDonModel;
use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class DatHangController extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $idMonAn = $_POST['IDMonAn'];
            $idCuaHang = $_POST['idCuaHang'];
            $SoLuong = $_POST['quantity'];
            $kq=hoaDonModel::themVaoGiohang($idMonAn,$SoLuong,$idCuaHang); 
            // var_dump($kq); die();
            echo $kq;
        
    }

    public function checkKhacCuaHangAction()
    {
        $idch = $_POST['idch'];
        $kq = hoaDonModel::checkCuahang($idch);
        echo ($kq); 
    }

}
