<?php

namespace App\Controllers;
use App\Models\hoaDonModel;
use App\Models\KhachHangModel;
use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class CheckoutController extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    
    
    public function indexAction()
    {
        if(!isset($_SESSION['username-client']))
        {
            header("location:/DoAn1/public/dang-nhap");
        } else {
            $gioHang= hoaDonModel::getChiTietHoaDonAll();
            $thongTinKhachHang = KhachHangModel::getKhachhangByID();
            // var_dump($thongTinKhachHang); die();
            View::render('Client/index.php', ['page'=>'ThanhToan', 'title'=>"Thanh Toán",'gioHang'=>$gioHang,'thongTinKhachHang'=>$thongTinKhachHang]);
        }
        
    }
}
