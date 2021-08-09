<?php

namespace App\Controllers;

use App\Models\monanModel;
use App\Models\cuaHangModel;
use App\Models\danhMucModel;
use App\Models\hoaDonModel;
use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class CCHQuanLyMonAnController extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */

    public function indexAction()
    {
        $idCuaHang = "";
        if (isset($_SESSION['id-chuCuaHang'])) {
            $idCuaHang = $_SESSION['id-chuCuaHang'];
            $getAllMonAn = monanModel::getMonAnOfCuaHangByIDCuaHang($idCuaHang);
            $getDanhMuc = danhMucModel::getAll();
            //var_dump($getAllMonAn);die();
            if (isset($_POST['bt-save-add'])) {
                $kq = $this->insertMonAnAction();
                $getAllMonAn = monanModel::getMonAnOfCuaHangByIDCuaHang($idCuaHang);
                $getDanhMuc = danhMucModel::getAll();
                // var_dump($kq);die();
                View::render('Client/index.php', ['page' => 'QuanLyMonAn', 'title' => "Quản Lý Món Ăn", 'listMonAnCuaHang' => $getAllMonAn, 'listDanhMuc' => $getDanhMuc]);
            }
            if (isset($_POST['bt-save-ud'])) {
                $kq = $this->updateMonAnAction();
                $getAllMonAn = monanModel::getMonAnOfCuaHangByIDCuaHang($idCuaHang);
                $getDanhMuc = danhMucModel::getAll();
                // var_dump($kq);die();
                View::render('Client/index.php', ['page' => 'QuanLyMonAn', 'title' => "Quản Lý Món Ăn", 'listMonAnCuaHang' => $getAllMonAn, 'listDanhMuc' => $getDanhMuc]);
            }

            View::render('Client/index.php', ['page' => 'QuanLyMonAn', 'title' => "Quản Lý Món Ăn", 'listMonAnCuaHang' => $getAllMonAn, 'listDanhMuc' => $getDanhMuc]);
        } else {
            header("Location:/DoAn1/public/");
        }
    }
    public function DonHangCuaCuaHangAction()
    {
        $idCuaHang = "";
        if (isset($_SESSION['id-chuCuaHang'])) {
            $idCuaHang = $_SESSION['id-chuCuaHang'];
            $getAllMonAn = monanModel::getMonAnOfCuaHangByIDCuaHang($idCuaHang);
            $getDonhangCuaHang = hoaDonModel::DonHangCuaCuaHang($idCuaHang);
            // var_dump($getDonhangCuaHang);die();
            View::render('Client/index.php', ['page' => 'DonHangCuaCuaHang', 'title' => "Quản Đơn Hàng", 'listMonAnCuaHang' => $getAllMonAn, 'DonHangCuaCuaHang' => $getDonhangCuaHang]);
        } else {
            header("Location:/DoAn1/public/");
        }
        
    }
    public function insertMonAnAction()
    {
        $idCuaHang = "";
        if (isset($_SESSION['id-chuCuaHang'])) {
            $idCuaHang = $_SESSION['id-chuCuaHang'];
        }
        $idDanhMuc = $_POST['danhmuc-add'];
        $tenMon = $_POST['tenmon-add'];
        $gia = $_POST['Gia-add'];
        $moTa = $_POST['mota-add'];
        $trangThai = $_POST['TrangThai-add'];
        $anh1 = $this->upLoadImage($_FILES['anh1-add']);
        $anh2 = $this->upLoadImage($_FILES['anh2-add']);
        $anh3 = $this->upLoadImage($_FILES['anh3-add']);
        return monanModel::insertMonAn($idCuaHang, $idDanhMuc, $tenMon, $gia, $anh1, $anh2, $anh3, $moTa, $trangThai);
        //header('Location:/DoAn1/public/admin/monan');
    }
    public function updateMonAnAction()
    {
        $idCuaHang = "";
        if (isset($_SESSION['id-chuCuaHang'])) {
            $idCuaHang = $_SESSION['id-chuCuaHang'];
        }
        $id = $_POST['id-ud'];
        $idDanhMuc = $_POST['danhmuc-ud'];
        $tenMon = $_POST['tenmon-ud'];
        $gia = $_POST['Gia-ud'];
        $moTa = $_POST['mota-ud'];
        $trangThai = $_POST['TrangThai-ud'];
        $anh1 = $this->upLoadImage($_FILES['anh1-ud']);
        $anh2 = $this->upLoadImage($_FILES['anh2-ud']);
        $anh3 = $this->upLoadImage($_FILES['anh3-ud']);
        return monanModel::updateMonan($id, $idCuaHang, $idDanhMuc, $tenMon, $gia, $anh1, $anh2, $anh3, $moTa, $trangThai);
    }
    public function deleteMonAction()
    {
        $params = $this->route_params;
        // var_dump($params); die();
        monanModel::moveTrash($params['idmon']);
        header("Location:/DoAn1/public/ql-mon-an");
    }
    public function upLoadImage($file)
    {
        $img_url = "";
        if (isset($file)) {
            if ($file['error'] == 0) {
                move_uploaded_file($file['tmp_name'], '../public/image/Res_img/dishes/' . $file['name']);
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
