<?php

namespace App\Models;

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
                    return 1;
            }
        }
    }
    public static function getUserName($username)
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM khachhang WHERE TenDangNhap = "' . $username . '"');
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result == null) {
            return 0;
        } else return 1;
    }
}
