<?php

namespace App\Controllers;

use \Core\View;
use App\Models\danhMucModel;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class AdDanhMucController extends AdBaseController
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $getListDanhMuc = danhMucModel::getAll();
        View::render('Admin/index.php', ['page' => 'danhmuc', 'listDanhMuc' => $getListDanhMuc] );
    }
}