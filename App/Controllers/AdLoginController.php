<?php

namespace App\Controllers;

use \Core\View;
use App\Models\adminModel;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class AdLoginController extends \Core\Controller
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
            $result = adminModel::login($username, $password);
            if ($result == -2)
            {
                $kq = "Vui lòng nhập thông tin!";
            } else if ($result == -1) {
                $kq = "Tên đăng nhập không tồn tại.";
            } else if ($result == 0 ) {
                $kq = "Mật khẩu không chính xác.";
            } else {
                
                header("location:/DoAn1/public/admin");
                $_SESSION['username'] = $username;
                
            }
            
        }
        
        View::render('Admin/login.php', ['loginResult' => $kq]);
    }
    public function logoutAction(){
       unset($_SESSION['username']);
       header("location:/DoAn1/public/admin/login");
    }
    
}
