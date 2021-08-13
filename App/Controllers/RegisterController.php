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
            if ($repon == 1)
            {
                header('Location:/DoAn1/public/verifi');
            } else {
                View::render('Client/index.php', ['page'=>'Register', 'title'=>"Đăng Ký",'KetQuaDK'=>$repon]);
            }
            
        }
        View::render('Client/index.php', ['page'=>'Register', 'title'=>"Đăng Ký",'KetQuaDK'=>$repon]);

    }
    public function pageVerificationAction()
    {
        View::render('Client/pageVerifi.php', []);
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
    public function xacThucEmailAction () { 
        $params = $this->route_params;
        $res = KhachHangModel::verification($params['vkey']);
        echo "Tài khoản đả được xác thực <a href='/DoAn1/public/dang-nhap'>Đăng nhập ngay</a>";
    }
}
