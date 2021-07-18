<?php

namespace App\Controllers;

use App\Models\danhMucModel;
use \Core\View;
use App\Models\monanModel;
use App\Models\cuaHangModel;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class AdMonAnController extends AdBaseController
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $getAllMonAn = monanModel::getAll();
        $getDanhMuc = danhMucModel::getAll();
        $getCuaHang = cuaHangModel::getAll();
        $countTrash = monanModel::countTrash();
        //var_dump($getAllMonAn);die();
        if (isset($_POST['bt-save-add']))
        {
            $kq = $this->insertMonAnAction(); 
            $getAllMonAn = monanModel::getAll();
            $getDanhMuc = danhMucModel::getAll();
            $getCuaHang = cuaHangModel::getAll();
            $countTrash = monanModel::countTrash();
            View::render('Admin/index.php', ['page' => 'monan', 'listMonAn'=>$getAllMonAn,'listDanhMuc'=>$getDanhMuc,'listCuaHang' => $getCuaHang,'kq'=>$kq, 'countTrash'=>$countTrash]);
        }
        View::render('Admin/index.php', ['page' => 'monan', 'listMonAn'=>$getAllMonAn,'listDanhMuc'=>$getDanhMuc,'listCuaHang' => $getCuaHang,'countTrash'=>$countTrash]);
    }
    public function trashMonAnAction() { 
        $getTrash = monanModel::getTrash();
        View::render('Admin/index.php', ['page' => 'trashMonAn', 'listMonAn'=>$getTrash]);
    }
    public function insertMonAnAction()
    {
            $idCuaHang = $_POST['cuahang-add'];
            $idDanhMuc = $_POST['danhmuc-add'];
            $tenMon = $_POST['tenmon-add'];
            $gia = $_POST['gia-add'];
            $moTa = $_POST['mota-add'];
            $trangThai = $_POST['trangthai-add'];
            $anh1 = $this->upLoadImage($_FILES['anh1-add']); 
            $anh2 = $this->upLoadImage($_FILES['anh2-add']); 
            $anh3 = $this->upLoadImage($_FILES['anh3-add']); 
            return monanModel::insertMonAn($idCuaHang, $idDanhMuc, $tenMon,$gia, $anh1,$anh2,$anh3,$moTa,$trangThai);
            //header('Location:/DoAn1/public/admin/monan');
    }
    public function updateMonAnAction(){
        return;
    }
    public function deleteMonAnAction(){
        $getID = $_POST['allID'];
        echo monanModel::moveTrash($getID);
        
    }
    public function RestoreMonAnAction(){
        $getID = $_POST['allID'];
        echo monanModel::moveTrashRestore($getID);
        
    }
    public function upLoadImage($file)
    {
        $img_url = "";
        if (isset($file)) {
            if ($file['error'] == 0) {
                move_uploaded_file($file['tmp_name'], '../public/image/' . $file['name']);
                $img_url = $file['name'];
            } else {
                return false;
            }
        } else {
            return false;
        }
        return $img_url;
    }
    
}