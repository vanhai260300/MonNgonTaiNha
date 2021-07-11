<?php

namespace App\Models;

use Exception;
use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class adminModel extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM quantrivien');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function login($username, $password)
    {
        $db = static::getDB();
        // $stmt = $db->prepare('SELECT * FROM quantrivien WHERE TenDangNhap = ? AND MatKhau = ?');
        // return $stmt->execute([$username, $password]);
        if ($username == "" || $password == "")
            return -2;
        else {
            $useCheck = static::getUserName($username);
            if ($useCheck == 0)
                return -1;
            else {
                $stmt = $db->query('SELECT * FROM quantrivien WHERE TenDangNhap = "' . $username . '" AND MatKhau = "' . $password . '"');
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
        $stmt = $db->query('SELECT * FROM quantrivien WHERE TenDangNhap = "' . $username . '"');
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result == null) {
            return 0;
        } else return 1;
    }
    public static function insertAdmin($fullname, $username, $password, $repassword)
    {
        $db = static::getDB();
        $result = false;
        if ($fullname == '' || $password == '' || $repassword == '' || $username == "")
            $result = false;
        else {
            try {
                if ($password != $repassword) {
                    $result = false;
                } else {
                    $stmt = $db->query('INSERT INTO quantrivien (IDAdmin, TenAdmin, TenDangNhap, MatKhau) 
                                    VALUES (NULL, "' . $fullname . '", "' . $username . '", "' . $password . '")');
                    $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $result = true;
                }
            } catch (Exception $e) {
                $result = false;
            }
        }
        return $result;
    }
}
