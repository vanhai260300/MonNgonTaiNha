<?php

namespace App\Controllers;

use App\Models\KhachHangModel;
use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class RegisterController extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {   
        $repon = "";
        if (isset($_POST['register']))
        {
            $repon = $this->DangKyKhachHang();
            View::render('Client/index.php', ['page'=>'Register', 'title'=>"Đăng Ký",'KetQuaDK'=>$repon]);
        }
        View::render('Client/index.php', ['page'=>'Register', 'title'=>"Đăng Ký",'KetQuaDK'=>$repon]);

    }
    public function DangKyKhachHang(){
        $fullName = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        return khachHangModel::insertKhachhang($fullName,$username,$password,$repassword,$email,$phone,$address);
    }
    public function checkUsserNameAction (){
        $usernameKH = $_POST['usernameKH'];
        echo KhachHangModel::getUserName($usernameKH);
    }
}
