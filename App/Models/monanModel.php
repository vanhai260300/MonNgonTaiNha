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
