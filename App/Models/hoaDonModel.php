<?php

namespace App\Models;

use Exception;
use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class hoaDonModel extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDb();
        $stmt = $db->query("SELECT * FROM hoadondathang as hd  
                            INNER JOIN (SELECT nvgiaohang.IDNVGH, nvgiaohang.TenNV FROM nvgiaohang ) nvgh ON nvgh.IDNVGH=hd.IDNVGH
                            INNER JOIN (SELECT khachhang.IDKhachHang, khachhang.TenKH, khachhang.SDT,khachhang.DiaChi FROM khachhang ) kh ON kh.IDKhachHang = hd.IDKhackHang
                            ORDER BY hd.TGGiaoHang");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}