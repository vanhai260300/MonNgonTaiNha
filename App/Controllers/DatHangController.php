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
    public function GioHangAction()
    {
        $gioHang= hoaDonModel::getChiTietHoaDonAll();
        View::render('Client/index.php', ['page'=>'GioHang', 'title'=>"Giỏ Hàng", 'gioHang'=>$gioHang]);
        
    }
    public function DonHangAction(){
        View::render('Client/index.php', ['page'=>'DonHang', 'title'=>"Đơn Hàng của bạn"]);
    }
    public function capNhatHoaDonAction()
    { 
        $params = $this->route_params;
        hoaDonModel::thanhToanHoaDon($params['idhd']);
        header("Location:/DoAn1/public/hoa-don");
    }
    public function checkKhacCuaHangAction()
    {
        $idch = $_POST['idch'];
        $kq = hoaDonModel::checkCuahang($idch);
        echo ($kq); 
    }
    public function DeleteItemCartAction()
    {
        
        $idMonAn = $_POST['idMon'];
        $idHoaDon = $_POST['idHoaDon'];
        hoaDonModel::deleteItemCart($idMonAn,$idHoaDon);
        
    }

}
