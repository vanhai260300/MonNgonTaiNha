<?php

namespace App\Controllers;

use \Core\View;
use App\Models\cuaHangModel;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class AdChuCuaHangController extends AdBaseController
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $getListCuaHang = cuaHangModel::getAll();
        
        View::render('Admin/index.php', ['page' => 'CuaHang', 'listCuaHang' => $getListCuaHang] );
    }
}