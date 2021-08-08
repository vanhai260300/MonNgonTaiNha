<?php

namespace App\Controllers;

use App\Models\cuaHangModel;
use App\Models\KhachHangModel;
use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class CCHLoginController extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $kq = "";
        if(isset($_POST['login']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $result = cuaHangModel::login($username, $password);
            if ($result == -2)
            {
                $kq = "Vui lòng nhập thông tin!";
            } else if ($result == -1) {
                $kq = "Tên đăng nhập không tồn tại.";
            } else if ($result == 0 ) {
                $kq = "Mật khẩu không chính xác.";
            } else {
                foreach ($result as $key => $val) {
                    $_SESSION['id-chuCuaHang'] = $val['IDCuaHang'];
                }
                $_SESSION['username-chuCuaHang'] = $username;
                header("location:/DoAn1/public/ql-mon-an");   
            }
        }
        
        View::render('Client/login.php', ['loginResult' => $kq, 'title'=>"Đăng Nhập Chủ Cửa Hàng", 'dangNhapCCH'=>'Chủ Cửa Hàng','action'=>'/DoAn1/public/dang-nhap-cch']);
    }
    public function logoutAction(){
        unset($_SESSION['username-chuCuaHang']);
        unset($_SESSION['id-chuCuaHang']);
        header("location:/DoAn1/public");
    }
}
