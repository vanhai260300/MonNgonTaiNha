<?php

namespace App\Models;

use Exception;
use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class cuaHangModel extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM cuahang');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    public static function updateAdmin($id,$fullname,$username)
    {
        $db = static::getDB();
        try {
            if ($fullname == '' || $username == '')
                return 0;
            else {
                $stmt = $db->prepare('UPDATE quantrivien SET TenAdmin = ?, TenDangNhap = ? WHERE IDAdmin = ?');
                if($stmt->execute([$fullname,$username,$id])) 
                    return 1;
                else {
                    return 0;
                }   
            }
        } catch (Exception $e) { return 0; }
        
        
    }
    public static function deleteAdmin($id) {
        $db = static::getDB();
        try {
            $stmt = $db->prepare("DELETE FROM quantrivien WHERE IDAdmin = ?");
            return $stmt->execute([$id]);
        } catch (Exception $e) {return 0;}
        
    }
}
