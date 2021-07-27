<?php

namespace App\Controllers;
use App\Models\cuaHangModel;
use App\Models\danhMucModel;
use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class CuahangController extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $getCuahang = cuaHangModel::getAll();
        $danhMuc = danhMucModel::getAll();
        View::render('Client/index.php', ['page'=>'CuaHang', 'listCuaHang'=>$getCuahang,'DanhMuc'=>$danhMuc]);
    }
}
