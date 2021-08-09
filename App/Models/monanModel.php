<?php

namespace App\Models;

use Exception;
use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class monanModel extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM monan as ma  
                            INNER JOIN (SELECT dm.IDDanhMuc,dm.TenDanhMuc FROM danhmucmonan as dm ) dam ON dam.IDDanhMuc = ma.IDDanhMuc
                            INNER JOIN cuahang ch ON ma.IDCuaHang = ch.IDCuaHang 
                            WHERE ma.deleteAt IS NULL                           
                            ORDER BY ma.Gia ASC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getTrash(){
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM monan as ma  
                            INNER JOIN (SELECT dm.IDDanhMuc,dm.TenDanhMuc FROM danhmucmonan as dm ) dam ON dam.IDDanhMuc = ma.IDDanhMuc
                            INNER JOIN cuahang ch ON ma.IDCuaHang = ch.IDCuaHang 
                            WHERE ma.deleteAt IS NOT NULL                           
                            ORDER BY ma.Gia ASC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }   
    public static function getMonAnPagi($page)
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT COUNT(IDMonAn) FROM   monan WHERE deleteAt IS NULL');
        $totalRecords = current($stmt->fetch(PDO::FETCH_ASSOC));
        $current_page = $page;
        $limit = 6;
        $totalPages = ceil($totalRecords / $limit);
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $totalPages) {
            $current_page = $totalPages;
        } else if ($current_page < 1) {
            $current_page = 1;
        }
        $start = ($current_page - 1) * $limit;
        $stpr = $db->query('SELECT * FROM monan as ma  
                            INNER JOIN (SELECT dm.IDDanhMuc,dm.TenDanhMuc FROM danhmucmonan as dm ) dam ON dam.IDDanhMuc = ma.IDDanhMuc
                            INNER JOIN cuahang ch ON ma.IDCuaHang = ch.IDCuaHang 
                            WHERE ma.deleteAt IS NULL                           
                            ORDER BY ma.Gia ASC 
                            LIMIT '.$start.', '.$limit.'');
        $MonAn = $stpr->fetchAll(PDO::FETCH_ASSOC);
        $paginatoinInfo = [
            'MonAn' => $MonAn,
            'totalPages' => $totalPages,
            'current_page' => $current_page
        ];
        return $paginatoinInfo;
    }
    public static function getMonAnTheoDMPagi($page,$idDM)
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT COUNT(IDMonAn) FROM   monan WHERE IDDanhMuc = '.$idDM.' AND deleteAt IS NULL');
        $totalRecords = current($stmt->fetch(PDO::FETCH_ASSOC));
        $current_page = $page;
        $limit = 6;
        $totalPages = ceil($totalRecords / $limit);
        // Giới hạn current_page trong khoảng 1 đến total_page
        if ($current_page > $totalPages) {
            $current_page = $totalPages;
        } else if ($current_page < 1) {
            $current_page = 1;
        }
        $start = ($current_page - 1) * $limit;
        if ($totalPages == 0)
        {
            $start = 1;
            $limit = 1;
        }
        $stpr = $db->query('SELECT * FROM monan as ma  
                            INNER JOIN (SELECT dm.IDDanhMuc,dm.TenDanhMuc FROM danhmucmonan as dm ) dam ON dam.IDDanhMuc = ma.IDDanhMuc
                            INNER JOIN cuahang ch ON ma.IDCuaHang = ch.IDCuaHang 
                            WHERE ma.IDDanhMuc = '.$idDM.' AND ma.deleteAt IS NULL                           
                            ORDER BY ma.Gia ASC 
                            LIMIT '.$start.', '.$limit.'');
        $MonAn = $stpr->fetchAll(PDO::FETCH_ASSOC);
        $paginatoinInfo = [
            'MonAn' => $MonAn,
            'totalPages' => $totalPages,
            'current_page' => $current_page
        ];
        return $paginatoinInfo;
    }
    public static function getMonAnOfCuaHang($idMonAn)
    {
        $db = static::getDB();
        $getIDCH = $db->query('SELECT IDCuaHang FROM monan WHERE IDMonAn = '.$idMonAn.'');
        $idCH = current($getIDCH->fetch(PDO::FETCH_ASSOC));
        
        $stmt = $db->query('SELECT * FROM monan as ma, cuahang as ch WHERE ma.IDCuaHang = '.$idCH.' AND ma.IDCuaHang = ch.IDCuaHang  ');
        $MonAnOfCuaHang =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        $getInfoCH = $db->query('SELECT * FROM cuahang WHERE IDCuaHang='.$idCH.'');
        $infoCH = $getInfoCH->fetchAll(PDO::FETCH_ASSOC);
        return [
            'MonAnCuaCuaHang' => $MonAnOfCuaHang,
            'ThongTinCuaHang' =>$infoCH
        ];
    }
    public static function getMonAnOfCuaHangByIDCuaHang($idCuahang){
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM monan as ma, cuahang as ch, danhmucmonan as dm WHERE ma.IDCuaHang = '.$idCuahang.' AND ma.IDCuaHang = ch.IDCuaHang AND dm.IDDanhMuc = ma.IDDanhMuc AND ma.deleteAt IS NULL');
        $MonAnOfCuaHang =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        $getInfoCH = $db->query('SELECT * FROM cuahang WHERE IDCuaHang='.$idCuahang.'');
        $infoCH = $getInfoCH->fetchAll(PDO::FETCH_ASSOC);
        return [
            'MonAnCuaCuaHang' => $MonAnOfCuaHang,
            'ThongTinCuaHang' =>$infoCH
        ];
    }
    public static function moveTrash($id){
        $db = static::getDB();
        $stmt = $db -> query('UPDATE monan SET deleteAt = 0 WHERE IDMonAn = '.$id.'');
        $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = static::countTrash();
        return $count;
    }
    public static function moveTrashRestore($id){
        $db = static::getDB();
        $stmt = $db -> query('UPDATE monan SET deleteAt = NULL WHERE IDMonAn = '.$id.'');
        $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = static::countTrash();
        return $count;
    }
    public static function countTrash(){
        $db = static::getDB();
        $countTrash =$db->query('SELECT COUNT(IDMonAn) FROM monan WHERE deleteAt = 0');
        return current($countTrash->fetch(PDO::FETCH_ASSOC));
    }
    public static function insertMonAn($idCuaHang, $idDanhMuc, $tenMon,$gia, $anh1,$anh2,$anh3,$moTa,$trangThai)
    {
        $db = static::getDB();
        $result = false;
        try {
            $stmt = $db->query('INSERT INTO monan (IDMonAn, IDCuaHang, IDDanhMuc, TenMonAn, Gia, Anh1, Anh2, Anh3, MoTa, TrangThai) VALUES (NULL, '.$idCuaHang.', '.$idDanhMuc.', "'.$tenMon.'", '.$gia.', "'.$anh1.'", "'.$anh2.'", "'.$anh3.'", "'.$moTa.'", "'.$trangThai.'")');
            $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = true;
        } catch (Exception $e) {
            $result = false;
        }
        return $result;
    }
    public static function updateMonAn($id,$idCuaHang, $idDanhMuc, $tenMon,$gia, $anh1,$anh2,$anh3,$moTa,$trangThai)
    {
        $db = static::getDB();
        try {
            $getImage = $db->query('SELECT Anh1,Anh2,Anh3 FROM monan WHERE IDMonAn='.$id.'');
            $allImage = $getImage->fetchAll(PDO::FETCH_ASSOC);
            foreach ($allImage as $key => $value) {
                if ($anh1 == ""){
                    $anh1 = $value['Anh1'];
                }
                if ($anh2 == ""){
                    $anh2 = $value['Anh2'];
                }
                if ($anh3 == ""){
                    $anh3 = $value['Anh3'];
                }
            } 
            $stmt = $db->prepare('UPDATE monan SET IDCuaHang = ?,IDDanhMuc = ?, TenMonAn = ?,Gia = ?,Anh1 = ?,Anh2 = ?, Anh3 = ?,MoTa = ?,TrangThai = ? WHERE IDMonAn = ?');
                if($stmt->execute([$idCuaHang, $idDanhMuc, $tenMon,$gia, $anh1,$anh2,$anh3,$moTa,$trangThai,$id])) 
                    return 1;
                else {
                    return 0;
                } 
        } catch (Exception $e) { return 0; }
        
        
    }
    public static function deleteMonAn($id) {
        $db = static::getDB();
        try {
            $stmt = $db->prepare("DELETE FROM monan WHERE IDMonAn = ?");
            return $stmt->execute([$id]);
        } catch (Exception $e) {return 0;}
        
    }
}
