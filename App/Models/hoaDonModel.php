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
            $getIDHoaDon = $db->query('SELECT IDHoaDon FROM hoadondathang WHERE IDKhackHang = '.$IDKhackHang.' AND IDNVGH = 0 AND IDTrangThai = 0 ');
            $getHoaDon = current($getIDHoaDon->fetch(PDO::FETCH_ASSOC));
            $countMonAn = $db->query('SELECT COUNT(IDMonAn) FROM chitiethoadon WHERE IDHoaDon = '.$getHoaDon.' AND IDMonAn='.$idMonAN.'');
            $slMon = current($countMonAn->fetch(PDO::FETCH_ASSOC));
            if ($slMon == 0) {
                $stInsCTHD = $db->query('INSERT INTO chitiethoadon (IDHoaDon, IDMonAn, SoLuong, TongTien, MoTa, GhiChu) VALUES ('.$getHoaDon.', '.$idMonAN.', '.$soLuong.', "", "", "") ');
                $stInsCTHD ->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $SoLuong = $db->query('SELECT SoLuong FROM chitiethoadon WHERE IDHoaDon = '.$getHoaDon.' AND IDMonAn='.$idMonAN.'');
                $slMon = current($SoLuong->fetch(PDO::FETCH_ASSOC));
                $stInsCTHD = $db->query('UPDATE chitiethoadon SET SoLuong = '.($slMon + $soLuong).' WHERE chitiethoadon.IDHoaDon = '.$getHoaDon.' AND chitiethoadon.IDMonAn = '.$idMonAN.'');
                $stInsCTHD ->fetchAll(PDO::FETCH_ASSOC);
            }
            
            $stDeleteCT = $db->query('DELETE FROM chitiethoadon WHERE IDHoaDon = '.$getHoaDon.' AND IDMonAn NOT IN (SELECT monan.IDMonAn FROM monan WHERE monan.IDCuaHang = '.$idCuaHang.')');
            $stDeleteCT->fetchAll(PDO::FETCH_ASSOC);
            
            return $slMon;
            
        }
        return;
    }
    public static function checkCuahang($idCuaHang)
    {
        $db = static::getDB();
        $IDKhackHang = $_SESSION['id-client'];
        try {
            $getIDHoaDon = $db->query('SELECT IDHoaDon FROM hoadondathang WHERE IDKhackHang = '.$IDKhackHang.' AND IDNVGH = 0 AND IDTrangThai = 0 ');
            $getHoaDon = current($getIDHoaDon->fetch(PDO::FETCH_ASSOC));
            $stDeleteCT = $db->query('SELECT * FROM chitiethoadon WHERE IDHoaDon = '.$getHoaDon.' AND IDMonAn NOT IN (SELECT monan.IDMonAn FROM monan WHERE monan.IDCuaHang = '.$idCuaHang.')');
            $kqTim = $stDeleteCT->fetchAll(PDO::FETCH_ASSOC);
            if (count($kqTim) == 0)
            {
                return 0;
            } else return 1;
        } catch(Exception $e) {
            return 1;
        }
        
    }
}