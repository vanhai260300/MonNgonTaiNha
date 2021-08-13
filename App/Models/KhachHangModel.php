<?php

namespace App\Models;

use Exception;
use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class KhachHangModel extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM khachhang');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getKhachhangByID()
    {
        $db = static::getDB();
        $idKhachhang = $_SESSION['id-client'];
        $stmt = $db->query('SELECT * FROM khachhang WHERE IDKhachHang=' . $idKhachhang . '');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function login($username, $password)
    {
        $db = static::getDB();
        if ($username == "" || $password == "")
            return -2;
        else {
            $useCheck = static::getUserName($username);
            if ($useCheck == 0)
                return -1;
            else {
                $stmt = $db->query('SELECT * FROM khachhang WHERE TenDangNhap = "' . $username . '" AND MatKhau = "' . $password . '"');
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if ($result == null) {
                    return 0;
                } else
                    return $result;
            }
        }
    }
    public static function insertKhachhang($fullName, $username, $password, $repassword, $email, $phone, $address)
    {
        $db = static::getDB();
        try {
            if ($fullName == "" || $username == "" || $password == "" || $repassword == "" || $email == "" || $phone == "" || $address == "") {
                return 0;
            } else {
                if (preg_match('/\s/', $username)) {
                    return 0;
                } else {
                    if ($password == $repassword) {
                        $vKey = md5(time() . $username);
                        // Verifited Email
                        $subject = "Xác thực tài khoản món ngon tại nhà";
                        $message = "<p>Nhấn vào <a href='http://localhost:8888/DoAn1/public/verifi/".$vKey."'>đây</a> để xác thực tài khoản của bạn</p>";
                        $headers = 'From: vanhai260300@gmail.com' . "\r\n" .
                            'MIME-Version: 1.0' . "\r\n" .
                            'Content-Type: text/html; charset=utf-8';
                        mail($email, $subject, $message, $headers);
                        $stmt = $db->query('INSERT INTO khachhang (TenKH, TenDangNhap, MatKhau, SDT, Email, DiaChi,XacThuc,vKey) VALUES ( "' . $fullName . '", "' . $username . '", "' . $password . '", "' . $phone . '", "' . $email . '","' . $address . '",0,"' . $vKey . '")');
                        $stmt->fetchAll(PDO::FETCH_ASSOC);
                        return 1;
                    } else {
                        return 0;
                    }
                }
            }
        } catch (Exception $e) {
            return 0;
        }
    }
    public static function verification($vKey)
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM khachhang WHERE XacThuc = 0 AND vKey = "' . $vKey . '"');
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return $result; die();
        if ($result == null) {
            //Account invalid or Already verified
            return 0;
        } else {
            try {
                $udVeri = $db->query('UPDATE khachhang SET XacThuc = 1 WHERE vKey = "' . $vKey . '"');
                $udVeri->fetchAll(PDO::FETCH_ASSOC);
                return 1;
            } catch (Exception $e) {
                return 0;
            }
            
        }
    }
    public static function getUserName($username)
    {
        $db = static::getDB();
        if (preg_match('/\s/', $username)) {
            return 1;
        } else {
            $stmt = $db->query('SELECT * FROM khachhang WHERE TenDangNhap = "' . $username . '"');
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result == null) {
                return 0;
            } else return 1;
        }
    }
}
