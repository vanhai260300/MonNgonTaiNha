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
    // public function __construct()
    // {
    //     if(!isset($_SESSION['username-client']))
    //     {
    //         header("location:/DoAn1/public/dang-nhap");
    //     }
    // }
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
        $getHoaDon = hoaDonModel::getHoaDonKH();
        // var_dump($getHoaDon); die();
        View::render('Client/index.php', ['page'=>'DonHang', 'title'=>"Đơn Hàng của bạn", 'HoaDonKhachHang'=>$getHoaDon]);
    }
    public function capNhatHoaDonAction()
    { 
        $params = $this->route_params;
        //var_dump($params); die;
        $kq = hoaDonModel::thanhToanHoaDon($params['idhd']);
        // var_dump($kq); die;
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
    public function ChiTietDonHangAction()
    {
        $params  = $this->route_params;
        $chiTietHoaDon =  hoaDonModel::getChiTietHoaDonByIdHD($params['iddh']);
        // var_dump($chiTietHoaDon); die();
        View::render('Client/index.php', ['page'=>'chiTietDonHang', 'title'=>"Chi tiết hóa đơn",'chiTietHoaDon' => $chiTietHoaDon]);
    }

}
