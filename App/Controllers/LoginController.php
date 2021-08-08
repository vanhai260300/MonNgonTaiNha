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
            if (isset($_COOKIE['username-client'])){
                $username = $_COOKIE['username-client'];
            }
            if (isset($_COOKIE['password-client'])){
                $password = $_COOKIE['password-client'];
            }
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
                    setcookie('id-client', $val['IDKhachHang'], time()+(60*60*24*30) );

                }
                $_SESSION['username-client'] = $username;
                setcookie('username-client', $username, time()+(60*60*24*30) );
                $_SESSION['password-client'] = $password;
                setcookie('password-client', $password, time()+(60*60*24*30) );
                header("location:/DoAn1/public");
                
                
                
            }
            
            
        }
        
        View::render('Client/login.php', ['loginResult' => $kq, 'title'=>"Đăng Nhập",'action'=>'/DoAn1/public/dang-nhap']);
    }
    public function logoutAction(){
        unset($_SESSION['username-client']);
        unset($_SESSION['id-client']);
        setcookie("username-client", "", time()-3600);
        setcookie("id-client", "", time()-3600);
        setcookie("password-client", "", time()-3600);
        header("location:/DoAn1/public");
    }
}
