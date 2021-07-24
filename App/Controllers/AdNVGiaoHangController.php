<?php

namespace App\Controllers;

use \Core\View;
use App\Models\NVGiaoHangModel;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class AdNVGiaoHangController extends AdBaseController
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $getNVgiaoHang = NVGiaoHangModel::getAll();
        View::render('Admin/index.php', ['page' => 'nhanvienGH', 'NVgiaoHang' => $getNVgiaoHang] );
    }
}