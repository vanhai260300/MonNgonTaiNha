<?php

namespace App\Controllers;

use \Core\View;
use App\Models\KhachHangModel;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class AdKhachHangController extends AdBaseController
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $getListKhachHang = KhachHangModel::getAll();
        //var_dump($getListKhachHang);die();
        View::render('Admin/index.php', ['page' => 'khachHang', 'listKhachHang' => $getListKhachHang] );
    }
}