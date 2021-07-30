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
    public static function getChiTietHoaDonAll()
    {
        $db = static::getDB();
        $idKH = $_SESSION['id-client'];
        $stmt = $db->query('SELECT IDHoaDon FROM hoadondathang WHERE IDKhackHang ='.$idKH.' AND IDNVGH = 0');
        try {
            $idHoaDon = current($stmt->fetch(PDO::FETCH_ASSOC));
        } catch (Exception $e) {
            $idHoaDon = 0;
        }
        
        $stmtCTHD = $db->query('SELECT * FROM chitiethoadon as ct, monan as ma WHERE IDHoaDon = '.$idHoaDon.' AND ma.IDMonAn = ct.IDMonAn');
        $chiTietHoaDon = $stmtCTHD->fetchAll(PDO::FETCH_ASSOC);
        return $chiTietHoaDon;
    }
    public static function themVaoGiohang($idMonAN,$soLuong,$idCuaHang)
    {
        $db = static::getDB();
        $IDKhackHang = $_SESSION['id-client'];
        $stIDHoaDon = $db->query('SELECT COUNT(IDKhackHang) FROM hoadondathang WHERE IDKhackHang = '.$IDKhackHang.' AND IDNVGH = 0 AND IDTrangThai = 0 ');
        $countHoaDon = current($stIDHoaDon->fetch(PDO::FETCH_ASSOC));
        if ($countHoaDon == 0){
            $stIns = $db->query('INSERT INTO hoadondathang ( IDKhackHang, IDNVGH, IDTrangThai) VALUES ('.$IDKhackHang.', 0, 0)');
            $stIns->fetchAll(PDO::FETCH_ASSOC);
            $getIDHoaDon = $db->query('SELECT IDHoaDon FROM hoadondathang WHERE IDKhackHang = '.$IDKhackHang.' AND IDNVGH = 0 AND IDTrangThai = 0 ');
            $getHoaDon = current($getIDHoaDon->fetch(PDO::FETCH_ASSOC));
            $stInsCTHD = $db->query('INSERT INTO chitiethoadon (IDHoaDon, IDMonAn, SoLuong, TongTien, MoTa, GhiChu) VALUES ('.$getHoaDon.', '.$idMonAN.', '.$soLuong.', "", "", "") ');
            $stInsCTHD ->fetchAll(PDO::FETCH_ASSOC);
            return 1;
        } else {
            $stDeleteCT = $db->query('DELETE FROM chitiethoadon WHERE IDHoaDon = 2 AND IDMonAn NOT IN (SELECT monan.IDMonAn FROM monan WHERE monan.IDCuaHang = 3)');
            $stDeleteCT->fetchAll(PDO::FETCH_ASSOC);
        }
        return;
    }
}