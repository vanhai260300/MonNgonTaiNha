<?php

namespace App\Controllers;

use \Core\View;
use App\Models\trangThaiModel;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class AdTrangThaiController extends AdBaseController
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $getListTrangThai = trangThaiModel::getAll();
        View::render('Admin/index.php', ['page' => 'trangThai', 'listTrangThaiHoaDon' => $getListTrangThai] );
    }
}