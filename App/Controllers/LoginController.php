<?php

namespace App\Controllers;

use App\Models\KhachHangModel;
use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class LoginController extends \Core\Controller
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
            $result = KhachHangModel::login($username, $password);
            if ($result == -2)
            {
                $kq = "Vui lòng nhập thông tin!";
            } else if ($result == -1) {
                $kq = "Tên đăng nhập không tồn tại.";
            } else if ($result == 0 ) {
                $kq = "Mật khẩu không chính xác.";
            } else {
                foreach ($result as $key => $val) {
                    $_SESSION['id-client'] = $val['IDKhachHang'];
                }
                $_SESSION['username-client'] = $username;
                header("location:/DoAn1/public");
                
                
                
            }
            
            
        }
        
        View::render('Client/login.php', ['loginResult' => $kq]);
    }
    public function logoutAction(){
        unset($_SESSION['username-client']);
        unset($_SESSION['id-client']);
        header("location:/DoAn1/public");
    }
}
